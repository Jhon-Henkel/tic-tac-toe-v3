<?php
namespace userPlay;

require_once __DIR__ . '/../../config/Constants.php';
require_once __DIR__ . '/../../src/banco/DataBase.php';

use dataBase\DataBase;
use constants\config;

class UserPlay
{
    public function play($play): void
    {
        echo '<script>alert("aaa")</script>';
        
        $selectPlayer = DataBase::getDb()->query ("SELECT * FROM player WHERE id_player = 1");
        $selectBoardId1 = DataBase::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $resultsPlayer = $selectPlayer->fetch_object();
        $resultsBoard = $selectBoardId1->fetch_object();

        if (is_null($resultsBoard->got_old)) {
            $gotOld = "UPDATE board SET got_old = 1 WHERE id_board = 1";
        } else {
            $gotOld = "UPDATE board SET got_old = got_old +1 WHERE id_board = 1";
        }

        $setXtoNullIaTrue = "UPDATE player SET X_O = null, IA = 1 WHERE id_player = 1";
        $setXTrue = "UPDATE player SET X_O = 1 WHERE id_player = 1";
        $setOTrue = "UPDATE player SET X_O = 2 WHERE id_player = 1";

        for ($position = 1; $position <= 9; $position++) {
            $field = config::STRING_TABULEIRO . $position;
            if ($play == $position && $resultsBoard->$field == $position) {
                $updateXBoardId1 = "UPDATE board SET " . $field . " = 'X' WHERE id_board = 1";
                $updateOBoardId1 = "UPDATE board SET " . $field . " = 'O' WHERE id_board = 1";
                $updateXBoardId2 = "UPDATE board SET " . $field . " = 'X' WHERE id_board = 2";
                $updateOBoardId2 = "UPDATE board SET " . $field . " = 'O' WHERE id_board = 2";
                if (
                    $resultsPlayer->qtd_players == config::VALOR_SINGLE_PLAYER
                    && $resultsPlayer->X_O == config::VALOR_X
                ) {
                    DataBase::getDb()->query ($gotOld);
                    DataBase::getDb()->query ($setXtoNullIaTrue);
                    DataBase::getDb()->query ($updateXBoardId1);
                    DataBase::getDb()->query ($updateXBoardId2);
                    break;
                }elseif (
                    $resultsPlayer->qtd_players == config::VALOR_MULTI_PLAYER
                    && $resultsPlayer->X_O == config::VALOR_X
                ) {
                    DataBase::getDb()->query ($updateXBoardId1);
                    DataBase::getDb()->query ($gotOld);
                    DataBase::getDb()->query ($setOTrue);
                    DataBase::getDb()->query ($updateXBoardId2);
                    break;
                }elseif (
                    $resultsPlayer->qtd_players == config::VALOR_MULTI_PLAYER
                    && $resultsPlayer->X_O == config::VALOR_O
                ) {
                    DataBase::getDb()->query ($updateOBoardId1);
                    DataBase::getDb()->query ($gotOld);
                    DataBase::getDb()->query ($setXTrue);
                    DataBase::getDb()->query ($updateOBoardId2);
                    break;
                }
            }
        }
    }
}