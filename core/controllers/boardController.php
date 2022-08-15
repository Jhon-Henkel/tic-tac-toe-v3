<?php

use core\class\Board;

require_once '../../vendor/autoload.php';

$board = new Board();

switch ($_GET['method']) {

    case 'getBoardOneData':
        echo json_encode($board->getBoardOneData());
    break;

    case 'getBoardTwoData':
        echo json_encode($board->getBoardTwoData());
    break;

    case 'resetGame':
        $board->resetGame();
    break;

    case 'gotOld':
        echo json_encode($board->gotOld());
    break;

    case 'somebodyWin':
        echo json_encode($board->somebodyWin());
    break;

    default:
    break;
}