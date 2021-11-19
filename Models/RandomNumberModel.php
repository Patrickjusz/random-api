<?php


class RandomNumber
{
    public function getNumber(int $min = 0, $max = 999999): int
    {
        return RAND($min, $max);
    }
}
