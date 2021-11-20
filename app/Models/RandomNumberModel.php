<?php

namespace App\Models;

class RandomNumberModel
{
    
    /**
     * Get random number array
     *
     * @param  int $min
     * @param  int $max
     * @return array
     */
    public static function getNumberArray(int $min = 0, $max = 999999): array
    {
        $randomNum = self::getNumber($min, $max);
        return [
            'id' =>  self::create($randomNum),
            'random' => $randomNum
        ];
    }

    /**
     * Move to separate class, for example: RandomNumberService
     * and "global" ehh.......... ;>
     *
     * @param  mixed $id
     * @return array
     */
    public static function getById(int $id): array
    {
        global $database;
        return (array)$database->select("SELECT * FROM random_numbers WHERE id = {$id}");
    }

        
    /**
     * Move to separate class, for example: RandomNumberService
     * and "global" ehh.......... ;>
     *
     * @param  mixed $number
     * @return int
     */
    private static function create(int $number): int
    {
        global $database;
        return $database->insert('random_numbers', ['number' => $number]);
    }
    
    /**
     * Get random number
     *
     * @param  mixed $min
     * @param  mixed $max
     * @return int
     */
    private static function getNumber(int $min = 0, $max = 999999): int
    {
        return RAND($min, $max);
    }
}
