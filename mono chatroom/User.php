<?php

class User
{
    private string $name;
    private int $pin;
    private int $id;

    public function __construct(string $name, int $pin, int $id)
    {
        $this->name = $name;
        $this->pin = $pin;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPin(): int
    {
        return $this->pin;
    }

    public function getID(): int
    {
        return $this->id;
    }
}