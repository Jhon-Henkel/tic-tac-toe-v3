<?php

use core\class\PrepareGameStart;

require_once '../../vendor/autoload.php';

$prepareGameStart = new PrepareGameStart;
$initialGamePost  = json_decode(file_get_contents('php://input'), true);

try {
    if ($prepareGameStart->validatePostParams($initialGamePost)) {
        $prepareGameStart->truncateTables();
        $prepareGameStart->prepareGameTables($initialGamePost);
    }
} catch (Exception $exception) {
    throw new Exception($exception);
}