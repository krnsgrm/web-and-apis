<?php

class DataStorages
{
    private $database;
    private array $data;

    public function __construct()
    {
        $this->database = fopen('data4.csv', 'rw+');
        $this->loadCSV();
    }

    private function loadCSV(): void
    {
        while (!feof($this->database)) {
            $personData = (array)fgetcsv($this->database);

            if (count($personData) > 1) {
                $this->data[] = new User((string)$personData[0], (int)$personData[1], (int)$personData[2]);
            }
        }
    }

    public function getByPin(int $pin): ?User
    {
        foreach ($this->data as $user) {
            if ($user->getPin() == $pin) {
                return $user;
            }
        }
        return null;
    }

    public function getByName(string $name): ?User
    {
        foreach ($this->data as $user) {
            if ($user->getName() == $name) {
                return $user;
            }
        }
    }
}