<?php

namespace App\Database;

final class Database
{
    /**
     * Data provider (factory method)
     *
     * @param  string $dbDriver
     * @param  string $hostOrFile
     * @param  string $user
     * @param  string $password
     * @return DatabaseDriver
     */
    public static function factory(
        string $dbDriver,
        string $hostOrFile = null,
        string $user = null,
        string $password = null
    ): DatabaseDriver {
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
