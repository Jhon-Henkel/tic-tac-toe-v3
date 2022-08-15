<?php

use core\class\Play;

require_once '../../vendor/autoload.php';

switch ($_GET['method']) {
    case 'postPositionPlay':
        $play = new Play();
        $postData = json_decode(file_get_contents('php://input'), true);
        $play->postPositionPlay($postData);
    break;
}