<?php

namespace core;

use Exception;
use mysqli;

class DataBase
{
    private $conn;

    private function connectDb()
    {
        try {
            $this->conn = new mysqli(
                MYSQL_SERVER,
                MYSQL_USER,
                MYSQL_PASS,
                MYSQL_DATABASE,
                MYSQL_PORT,
                MYSQL_SOCKET,
            );

            return $this->conn;

        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    private function disconnectDb(): void
    {
        mysqli_close($this->conn);
    }

    /**
     * @throws Exception
     */
    public function select(string $sql):  array
    {
        $sql = trim($sql);

        if (!preg_match('/^SELECT/i', $sql)){
            throw new Exception('Base de dados não é do tipo SELECT');
        }

        $this->connectDb();
        $results = null;

        try {
            $mysqli = $this->conn->query($sql);
            $results = $mysqli->fetch_assoc();

        }catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
        return $results;
    }

    /**
     * @throws Exception
     */
    public function insert(string $sql): void
    {
        $sql = trim($sql);

        if (!preg_match('/^INSERT/i', $sql)){
            throw new \mysqli_sql_exception('Base de dados não é do tipo INSERT');
        }

        $this->connectDb();

        try {
            $this->conn->query($sql);
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function update(string $sql): void
    {
        $sql = trim($sql);

        if (!preg_match('/^UPDATE/i', $sql)){
            throw new Exception('Base de dados não é do tipo UPDATE');
        }

        $this->connectDb();

        try {
            $this->conn->prepare($sql);
        } catch (\mysqli_sql_exception $e) {
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
            $this->conn->query($sql);
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }
}