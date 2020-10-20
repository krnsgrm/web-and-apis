<?php

class User
{
    private string $name;
    private int $pin;

    public function __construct(string $name, int $pin)
    {
        $this->name = $name;
        $this->pin = $pin;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPin(): int
    {
        return $this->pin;
    }
}