<?php

namespace core;

use Exception;
use PDO;

class DataBase
{
    private $connectDb;

    private function connectDb()
    {
        $this->connectDb = new PDO(
            'mysql:'
            . 'host=' . MYSQL_SERVER . ';'
            . 'dbname=' . MYSQL_DATABASE . ';'
            . 'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        //debug
        $this->connectDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function disconnectDb()
    {
        $this->connectDb = null;
    }

    /**
     * @throws Exception
     */
    public function select($sql, $params = null)
    {
        $sql = trim($sql);

        if (!preg_match('/^SELECT/i', $sql)){
            throw new Exception('Base de dados não é do tipo SELECT');
        }

        $this->connectDb();
        $results = null;

        try {
            $pdo = $this->connectDb->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            }else {
                $pdo->execute();
            }

            $results = $pdo->fetchall(PDO::FETCH_ASSOC);

        }catch (\PDOException $exception) {
            return false;
        }

        $this->disconnectDb();
        return $results;
    }

    /**
     * @throws Exception
     */
    public function insert($sql, $params = null)
    {
        $sql = trim($sql);

        if (!preg_match('/^INSERT/i', $sql)){
            throw new Exception('Base de dados não é do tipo INSERT');
        }

        $this->connectDb();

        try {
            $pdo = $this->connectDb->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            } else {
                $pdo->execute();
            }
        } catch (\PDOException $exception) {
            return false;
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function update($sql, $params = null)
    {
        $sql = trim($sql);

        if (!preg_match('/^UPDATE/i', $sql)){
            throw new Exception('Base de dados não é do tipo UPDATE');
        }

        $this->connectDb();

        try {
            $pdo = $this->connectDb->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            } else {
                $pdo->execute();
            }
        } catch (\PDOException $exception) {
            return false;
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function delete($sql, $params = null)
    {
        $sql = trim($sql);

        if (!preg_match('/^DELETE/i', $sql)){
            throw new Exception('Base de dados não é do tipo DELETE');
        }

        $this->connectDb();

        try {
            $pdo = $this->connectDb->prepare($sql);

            if (!empty($params)) {
                $pdo->execute($params);
            } else {
                $pdo->execute();
            }
        } catch (\PDOException $exception) {
            return false;
        }

        $this->disconnectDb();
    }

    /**
     * @throws Exception
     */
    public function truncate($sql)
    {
        $sql = trim($sql);

        $this->connectDb();

        try {
            $pdo = $this->connectDb->prepare($sql);
            $pdo->execute();
        } catch (\PDOException $exception) {
            return false;
        }

        $this->disconnectDb();
    }
}