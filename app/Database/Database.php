<?php

namespace App\Database;

final class Database
{
    public static function factory(string $dbDriver, string $hostOrFile = '', string $user = '', string $password = '')
    {
        switch ($dbDriver) {
            case 'sqlite3':
                return new SqlLiteDriver($hostOrFile);
                break;
            // case 'xml':
                //     return new ()
                //     break;
                // (...)
        }
    }
}
