<?php

class Person
{
    private string $name;
    private string $surname;
    private string $personalCode;
    private string $address;

    public function __construct(string $name, string $surname, string $personalCode, string $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalCode = $personalCode;
        $this->address = $address;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getPersonalCode()
    {
        return $this->personalCode;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function toArray()
    {
        return [$this->getName(), $this->getSurname(), $this->getPersonalCode(), $this->getAddress()];
    }
}