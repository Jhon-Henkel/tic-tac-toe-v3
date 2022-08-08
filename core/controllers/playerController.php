<?php

use core\class\Player;

require_once '../../vendor/autoload.php';

if ($_GET['method'] == 'getPlayerData') {
    $player = new Player();
    echo json_encode($player->getPlayerData()[0]);
}
