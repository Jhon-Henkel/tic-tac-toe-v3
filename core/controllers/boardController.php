<?php

use core\class\Board;

require_once '../../vendor/autoload.php';

if ($_GET['method'] == 'getBoardOneData') {
    $board = new Board();
    echo json_encode($board->getBoardOneData()[0]);
}

if ($_GET['method'] == 'getBoardTwoData') {
    $board = new Board();
    echo json_encode($board->getBoardTwoData()[0]);
}

if ($_GET['method'] == 'resetGame') {

    $board = new Board();
    $board->resetGame();
}