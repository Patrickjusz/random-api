<?php

namespace App\Database;

interface DatabaseDriver
{
    public function select(string $query);
    public function insert();
}
