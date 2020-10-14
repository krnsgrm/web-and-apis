<?php

class DataStorage extends Person
{
    private $file;
    private array $data;

    public function __construct()
    {
        $this->file = fopen('data.csv', 'rw+');
        $this->loadPersons();
    }

    public function search(string $personalCode): ?Person
    {
        foreach ($this->data as $person) {
            if ($person->getPersonalCode() == $personalCode) {
                return $person;
            }
        }
        return null;
    }

    private function loadPersons(): void
    {
        while (!feof($this->file)) {
            $personData = (array)fgetcsv($this->file);

            if (!empty($personData[0])) {
                $this->data[] = new Person(
                    (string)$personData[0],
                    (string)$personData[1],
                    (string)$personData[2],
                    (string)$personData[3],
                );
            }
        }
    }

    public function saveDataCSV(Person $person): void
    {
        fputcsv($this->file, $person->toArray());
    }
}