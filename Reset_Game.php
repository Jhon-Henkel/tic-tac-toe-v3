<?php
    require 'src/banco/DataBase.php';

    $truncatePlayer = "TRUNCATE TABLE player";
    $truncateBoard = "TRUNCATE TABLE board";

    connectDB::getDb()->query ($truncatePlayer);
    connectDB::getDb()->query ($truncateBoard);
    connectDB::getDb()->close();

    header('location: index.html');