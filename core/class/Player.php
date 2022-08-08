<?php
namespace core\class;

use core\DataBase;
use Exception;

class Player
{
    /**
     * @throws Exception
     */
    public function getPlayerData(): array
    {
        $db = new DataBase();
        return $db->select('SELECT * FROM player');
    }
}