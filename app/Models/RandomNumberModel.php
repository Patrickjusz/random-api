<?php

namespace App\Models;

class RandomNumberModel
{
    public function getNumber(int $min = 0, $max = 999999): int
    {
        return RAND($min, $max);
    }

    public function getNumberArray(int $min = 0, $max = 999999): array
    {
        return ['random' => $this->getNumber($min, $max)];
    }

    public function getById(int $id)
    {
        global $database;
        return $database->select("SELECT * FROM random_numbers WHERE id = {$id}");
    }
}
