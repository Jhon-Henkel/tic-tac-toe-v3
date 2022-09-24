<?php

namespace core\class;

use core\DataBase;
use Exception;

class Board
{
    /**
     * @throws Exception
     */
    public function getBoardOneData(): array
    {
        $db = new DataBase();
        return $db->select('SELECT * FROM board WHERE id_board = 1');
    }

    /**
     * @throws Exception
     */
    public function getBoardTwoData(): array
    {
        $db = new DataBase();
        return $db->select('SELECT * FROM board WHERE id_board = 2');
    }

    /**
     * @throws Exception
     */
    public function resetGame(): bool
    {
        $prepareGame = new PrepareGameStart();
        $prepareGame->truncateTables();
        return true;
    }
}