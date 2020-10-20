<?php

class Message
{
    private int $id;
    private string $message;

    public function __construct(int $id, string $message)
    {
        $this->id = $id;
        $this->message = $message;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}