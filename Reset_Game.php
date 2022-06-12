<?php

namespace resetGame;

require_once __DIR__ . '/src/banco/DataBase.php';

use banco\connectDB;

$truncatePlayer = "TRUNCATE TABLE player";
$truncateBoard = "TRUNCATE TABLE board";

connectDB::getDb()->query ($truncatePlayer);
connectDB::getDb()->query ($truncateBoard);
connectDB::getDb()->close();

header(__DIR__ . 'location: /view/index.html');