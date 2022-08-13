<?php

use core\class\Play;

require_once '../../vendor/autoload.php';

if ($_GET['method'] == 'postPositionPlay') {

    $play = new Play();

    $postData = json_decode(file_get_contents('php://input'), true);

    $play->postPositionPlay($postData);
//    echo json_encode($play->postPositionPlay($postData));
}