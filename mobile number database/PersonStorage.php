<?php

class PersonStorage
{
    private $database;
    private array $data;

    public function __construct()
    {
        $this->database = fopen('data2.csv', 'rw+');
        $this->loadCSV();
    }

    private function loadCSV(): void
    {
        while (!feof($this->database)) {
            $personData = (array)fgetcsv($this->database);

            if (count($personData) > 1) {
                $this->data[] = new Persons((string)$personData[0], (string)$personData[1], (int)$personData[2]);
            }
        }
    }

    public function getByNumber(string $number): ?Persons
    {
        foreach ($this->data as $person) {
            if ($person->getNumber() == $number) {
                return $person;
            }
        }
        return null;
    }
}