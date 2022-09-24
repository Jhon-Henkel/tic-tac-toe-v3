<?php

namespace core;

use mysqli;

class DataBase
{
    private mysqli $conn;

    private function connectDb(): void
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
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    private function disconnectDb(): void
    {
        mysqli_close($this->conn);
    }

    public function select(string $sql):  array
    {
        $sql = trim($sql);

        if (!preg_match('/^SELECT/i', $sql)){
            throw new \mysqli_sql_exception('Base de dados não é do tipo SELECT');
        }

        try {
            $this->connectDb();
            $mysqli = $this->conn->query($sql);
            $results = $mysqli->fetch_assoc() ?? null;

        }catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
        return $results;
    }

    public function insert(string $sql): void
    {
        $sql = trim($sql);

        if (!preg_match('/^INSERT/i', $sql)){
            throw new \mysqli_sql_exception('Base de dados não é do tipo INSERT');
        }

        try {
            $this->connectDb();
            $this->conn->query($sql);
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }

    public function update(string $sql): void
    {
        $sql = trim($sql);

        if (!preg_match('/^UPDATE/i', $sql)){
            throw new \mysqli_sql_exception('Base de dados não é do tipo UPDATE');
        }

        try {
            $this->connectDb();
            $this->conn->query($sql);
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }

    public function truncate(string $sql): void
    {
        $sql = trim($sql);

        try {
            $this->connectDb();
            $this->conn->query($sql);
        } catch (\mysqli_sql_exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        $this->disconnectDb();
    }
}