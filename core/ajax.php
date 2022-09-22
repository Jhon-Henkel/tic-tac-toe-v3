<?php

use core\class\Play;
use core\class\Board;
use core\class\Player;

require_once '../vendor/autoload.php';

switch ($_GET['method']) {
    case 'postPositionPlay':
        $play = new Play();
        $postData = json_decode(file_get_contents('php://input'), true);
        $play->postPositionPlay($postData);
        break;

    case 'getBoardOneData':
        $board = new Board();
        echo json_encode($board->getBoardOneData());
        break;

    case 'getBoardTwoData':
        $board = new Board();
        echo json_encode($board->getBoardTwoData());
        break;

    case 'resetGame':
        $board = new Board();
        $board->resetGame();
        break;

    case 'getPlayerData':
        $player = new Player();
        echo json_encode($player->getPlayerData()[0]);
        break;
}