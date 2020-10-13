<?php

class Calculator
{

    private float $money;
    private int $duration;
    private float $rate;

    public function __construct(float $money, int $duration, float $rate)
    {

        $this->money = $money;
        $this->duration = $duration;
        $this->rate = $rate;
    }

    public function calculation()
    {
        $result = $this->money;
        for ($i = 1; $i <= $this->duration; $i++) {
            $result += ($this->rate / 100 * $result);
        }
        return number_format($result, 2);
    }
}