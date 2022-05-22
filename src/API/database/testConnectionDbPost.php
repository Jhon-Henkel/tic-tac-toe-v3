<?php

$configPost = json_decode(file_get_contents('php://input'), true);

try {
    $testDb = new mysqli($configPost['host'], $configPost['username'], $configPost['password']);
} catch (mysqli_sql_exception) {
    http_response_code(500);
}