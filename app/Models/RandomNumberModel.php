<?php

namespace App\Models;

class RandomNumberModel
{
    public static function getNumberArray(int $min = 0, $max = 999999): array
    {
        $randomNum = self::getNumber($min, $max);
        return [
            'id' =>  self::create($randomNum),
            'random' => $randomNum
        ];
    }

    //Move to separate class, for example: RandomNumberService...
    public static function getById(int $id)
    {
        global $database;
        return $database->select("SELECT * FROM random_numbers WHERE id = {$id}");
    }

    //Move to separate class, for example: RandomNumberService...
    private static function create(int $number): int
    {
        global $database;
        return $database->insert('random_numbers', ['number' => $number]);
    }

    private static function getNumber(int $min = 0, $max = 999999): int
    {
        return RAND($min, $max);
    }
}
