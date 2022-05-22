<?php

class connectDB
{
    private static mysqli $db;
    private static string $hostName;
    private static string $userName;
    private static string $password;

    public static function createDb()
    {
        $createTablePlayer = "
        CREATE TABLE IF NOT EXISTS player (
            id_player int NOT NULL AUTO_INCREMENT,
            X_O varchar(6) DEFAULT NULL,
            IA varchar(6) DEFAULT NULL,
            difficulty varchar(30) DEFAULT NULL,
            qtd_players varchar(3) DEFAULT NULL,
        PRIMARY KEY (`id_player`)) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
        ";

        $createTableBoard = "
        CREATE TABLE IF NOT EXISTS board (
            id_board int NOT NULL AUTO_INCREMENT,
            J1 varchar(30) DEFAULT '1',
            J2 varchar(30) DEFAULT '2',
            J3 varchar(30) DEFAULT '3',
            J4 varchar(30) DEFAULT '4',
            J5 varchar(30) DEFAULT '5',
            J6 varchar(30) DEFAULT '6',
            J7 varchar(30) DEFAULT '7',
            J8 varchar(30) DEFAULT '8',
            J9 varchar(30) DEFAULT '9',
            got_old varchar(6) DEFAULT NULL,
            board_done varchar(6) DEFAULT NULL,
            form varchar(5) DEFAULT NULL,
        PRIMARY KEY (`id_board`)) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
        ";

        $hostName = self::getHostName();
        $userName = self::getUserName();
        $password = self::getPassword();
        $dbCrete = new mysqli($hostName, $userName, $password);
        $dbCrete->query('CREATE DATABASE IF NOT EXISTS tic_tac_toe');

        $db = self::getDb();
        $db->query ($createTablePlayer);
        $db->query ($createTableBoard);
        $db->query('set names "utf8"');
        $db->query('set character_set_connection=utf8');
        $db->query('set character_set_client=utf8');
        $db->query('set character_set_results=utf8');
    }

    /**
     * @return mysqli
     */
    public static function getDb(): mysqli
    {
        $hostName = self::getHostName();
        $userName = self::getUserName();
        $password = self::getPassword();
        return new mysqli($hostName, $userName, $password, 'tic_tac_toe');
    }

    /**
     * @return string
     */
    public static function getHostName(): string
    {
        return self::$hostName;
    }

    /**
     * @param string $hostName
     */
    public static function setHostName(string $hostName)
    {
        self::$hostName = $hostName;
    }

    /**
     * @return string
     */
    public static function getUserName(): string
    {
        return self::$userName;
    }

    /**
     * @param string $userName
     */
    public static function setUserName(string $userName)
    {
        self::$userName = $userName;
    }

    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return self::$password;
    }

    /**
     * @param string $password
     */
    public static function setPassword(string $password)
    {
        self::$password = $password;
    }
}