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
        return $db->select('SELECT * FROM board WHERE id_board = 1')[0];
    }

    /**
     * @throws Exception
     */
    public function getBoardTwoData(): array
    {
        $db = new DataBase();
        return $db->select('SELECT * FROM board WHERE id_board = 2')[0];
    }

    /**
     * @throws Exception
     */
    public function resetGame(): bool
    {
        $db = new DataBase();
        $db->truncate('TRUNCATE TABLE player');
        $db->truncate('TRUNCATE TABLE board');
        return true;
    }

    /**
     * @throws Exception
     */
    public function gotOld(): array
    {
        $db = new DataBase();
        $gotOld = $db->select('SELECT got_old FROM board WHERE id_board = 1')[0];

        return array("gotOldValue" => $gotOld['got_old']);
    }

    /**
     * @throws Exception
     */
    public function somebodyWin(): array
    {
        $db = new DataBase();
        $play = 'x';
        $boardOne = $db->select('SELECT * FROM board WHERE id_board = 1')[0];

        for ($i = 1; $i <= 2; $i++) {
            if (
                ($boardOne['J1'] == $play && $boardOne['J2'] == $play && $boardOne['J3'] == $play)
                || ($boardOne['J4'] == $play && $boardOne['J5'] == $play && $boardOne['J6'] == $play)
                || ($boardOne['J7'] == $play && $boardOne['J8'] == $play && $boardOne['J9'] == $play)
                || ($boardOne['J1'] == $play && $boardOne['J4'] == $play && $boardOne['J7'] == $play)
                || ($boardOne['J2'] == $play && $boardOne['J5'] == $play && $boardOne['J8'] == $play)
                || ($boardOne['J3'] == $play && $boardOne['J6'] == $play && $boardOne['J9'] == $play)
                || ($boardOne['J1'] == $play && $boardOne['J5'] == $play && $boardOne['J9'] == $play)
                || ($boardOne['J3'] == $play && $boardOne['J5'] == $play && $boardOne['J7'] == $play)
            ) {
                return array("win" => $play);
            }
            $play = 'o';
        }
        return array("win" => null);
    }
}