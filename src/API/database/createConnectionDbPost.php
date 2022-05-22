<?php
require '../../banco/DataBase.php';

$config = json_decode(file_get_contents('php://input'));

try {
    $createDb = new connectDB();
    $createDb->setHostName($config->host);
    $createDb->setUserName($config->username);
    $createDb->setPassword($config->password);

    $createDb->createDb();
} catch (mysqli_sql_exception) {
    http_response_code(500);
}