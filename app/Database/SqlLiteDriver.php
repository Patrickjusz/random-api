<?php

namespace App\Database;

use PDO;
use PDOException;

class SqlLiteDriver implements DatabaseDriver
{
    private PDO $db;
    private int $lastInsertId = 0;
    
    /**
     * __construct
     *
     * @param  string $filename
     * @return void
     */
    public function __construct(string $filename)
    {
        if (file_exists($filename)) {
            $this->db = new PDO("sqlite:{$filename}");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Database file {$filename} not exists!");
        }
    }

    /**
     * Select record
     *
     * @param  string $query
     * @return array
     */
    public function select(string $query): array
    {
        try {
            $sql = $this->db->query($query);
            $sql->execute();
            $data = $sql->fetchAll();
        } catch (PDOException $e) {
            throw new \Exception("Ohh no! {$e->getMessage()}");
        }

        return (array)$data;
    }

    /**
     * Insert new record
     *
     * @param  string $tableName
     * @param  array  $params
     * @return int
     */
    public function insert(string $tableName, array $params): int
    {
        $this->lastInsertId = 0;
        $keys = null;
        $values = null;

        foreach ($params as $key => $value) {
            $keys = $key . ',';
            $values = ":" . $key . ",";
        }

        $keys = rtrim($keys, ',');
        $values = rtrim($values, ',');
        $query = "INSERT INTO {$tableName} ($keys) VALUES ($values)";
        $stmt = $this->db->prepare($query);

        foreach ($params as $key => $value) {
            $stmt->bindValue((':' . $key), $value);
        }

        $stmt->execute();
        $this->lastInsertId = (int)$this->db->lastInsertId() ?? 0;

        return $stmt ? ($this->lastInsertId ?? true) : false;
    }

    /**
     * Get the value of lastInsertId
     *
     * @return int
     */
    public function getLastInsertId(): int
    {
        return $this->lastInsertId;
    }
}
