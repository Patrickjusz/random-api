<?php

namespace App\Database;

final class Database
{
    private $dbDriver;
    private $hostName;
    private $user;
    private $password;
    public static function factory(string $dbDriver, string $hostOrFile = '', string $user = '', string $password = '')
    {
        switch ($dbDriver) {
            case 'sqlite3':
                return new SqlLiteDriver($hostOrFile);
                break;
                // case 'mysql':
                //     return new SqlLiteDatabase($hostOrFile);
                //     break;
                // ,..
        }
    }
}
