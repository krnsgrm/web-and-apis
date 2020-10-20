<?php

class Pin
{
    private string $pinCode;
    private bool $locked;
    private int $count = 0;

    public function choosePin(string $pinCode): void
    {
        $this->pinCode = $pinCode;
    }

    public function unlock(int $pinCode): string
    {
        if ($pinCode == $this->pinCode) {
            $this->locked = false;
            return 'Unlocked!';
        }
        return 'Locked!';
    }

    public function display(): void
    {
        for ($i = 0; $i < $this->getCount(); $i++) {
            echo '*';
        }
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function addCount(): void
    {
        $this->count = $this->count + 1;
    }

    public function getPin(int $pinCode)
    {
        return $this->$pinCode;
    }
}