<?php

namespace App\Database;

interface DatabaseDriver
{
    public function select(string $query);
    public function insert(string $tableName, array $params): int;
}
