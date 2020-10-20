<?php

class DataStorage
{
    private $database;
    private array $data;

    public function __construct()
    {
        $this->database = fopen('data3.csv', 'rw+');
        $this->loadCSV();
    }

    private function loadCSV(): void
    {
        while (!feof($this->database)) {
            $personData = (array)fgetcsv($this->database);

            if (count($personData) > 1) {
                $this->data[] = new User((string)$personData[0], (int)$personData[1]);
            }
        }
    }

    public function getByPin(string $pin): ?User
    {
        foreach ($this->data as $user) {
            if ($user->getPin() == $pin) {
                return $user;
            }
        }
        return null;
    }
}