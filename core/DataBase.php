<?php

namespace core;

use Exception;
use PDO;

class DataBase
{
    private $conn;

    private function connectDb()
    {
        try {
            $this->conn = new PDO(
                'mysql: host=' . MYSQL_SERVER . '; dbname=' . MYSQL_DATABASE,
                MYSQL_USER,
                MYSQL_PASS
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;

        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    private function disconnectDb(): void
    {
        $this->conn = null;
    }

    /**
     * @throws Exception
     */
    public function select(string $sql, ?array $params = null):  array
    {
        $sql = trim($sql);

        if (!preg_match('/^SELECT/i', $sql)){
            throw new Exception('Base de dados não é do tipo SELECT');
        }

        $this->connectDb();
        $results = null;

        try {
            $pdo = $this->conn->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            }else {
                $pdo->execute();
            }

            $results = $pdo->fetchall(PDO::FETCH_ASSOC);

        }catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
        return $results;
    }

    /**
     * @throws Exception
     */
    public function insert(string $sql, ?array $params = null): void
    {
        $sql = trim($sql);

        if (!preg_match('/^INSERT/i', $sql)){
            throw new Exception('Base de dados não é do tipo INSERT');
        }

        $this->connectDb();

        try {
            $pdo = $this->conn->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            } else {
                $pdo->execute();
            }
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function update(string $sql, ?array $params = null): void
    {
        $sql = trim($sql);

        if (!preg_match('/^UPDATE/i', $sql)){
            throw new Exception('Base de dados não é do tipo UPDATE');
        }

        $this->connectDb();

        try {
            $pdo = $this->conn->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            } else {
                $pdo->execute();
            }
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function truncate(string $sql): void
    {
        $sql = trim($sql);

        $this->connectDb();

        try {
            $pdo = $this->conn->prepare($sql);
            $pdo->execute();
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }
}