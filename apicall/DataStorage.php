<?php

class DataStorage
{
    private $file;
    private array $persons;

    public function __construct()
    {
        $this->file = fopen('nameStorage.csv', 'rw+');
        $this->loadPersons();
    }

    public function getByName(string $name): Person
    {
        foreach ($this->persons as $person) {
            if ($person->getName() === $name) {
                return $person;
            }
        }
        return $this->getDataFromAPI($name);
    }

    private function loadPersons(): void
    {
        while (!feof($this->file)) {
            $personData = (array)fgetcsv($this->file);

            $this->persons[] = new Person((string)$personData[0], (int)$personData[1], (int)$personData[2]);
        }
    }

    private function getDataFromAPI(string $name): Person
    {
        $data = file_get_contents('https://api.agify.io/?name=' . $name);
        $person = json_decode($data, true);
        fputcsv($this->file, $person);
        return new Person($person['name'], $person['age'], $person['count']);
    }
}