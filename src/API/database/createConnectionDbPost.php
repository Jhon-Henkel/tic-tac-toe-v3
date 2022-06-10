<?php

namespace createConnectionDbPost;

include_once '../../../config/Constants.php';

use banco;
use mysqli_sql_exception;

$config = json_decode(file_get_contents('php://input'));

try {
    $createDb = new banco\connectDB();
    $createDb->setHostName($config->host);
    $createDb->setUserName($config->username);
    $createDb->setPassword($config->password);

    $createDb->createDb();
} catch (mysqli_sql_exception) {
    http_response_code(500);
}