<?php

namespace resetGame;

require_once __DIR__ . '/src/banco/DataBase.php';

use dataBase\DataBase;

$truncatePlayer = "TRUNCATE TABLE player";
$truncateBoard = "TRUNCATE TABLE board";

DataBase::getDb()->query ($truncatePlayer);
DataBase::getDb()->query ($truncateBoard);
DataBase::getDb()->close();

header(__DIR__ . 'location: /view/index.html');