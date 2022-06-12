<?php

namespace iaPlay;

require_once __DIR__ . '/../../config/Constants.php';
require_once __DIR__ . '/../../src/banco/DataBase.php';
require_once __DIR__ . '/../EndGame.php';
require_once __DIR__ . '/Default.php';
require_once __DIR__ . '/Attack.php';
require_once __DIR__ . '/Defend.php';

use banco;
use endGame;
use defaultIa;
use attack;
use defend;
use constants;

class IaPlay
{
    public function IaPlay (): void
    {
        $end    = new endGame\EndGame();
        $defend = new defend\Defend();
        $attack = new attack\Attack();

        $end->setHaveWin(constants\Constants::STRING_X);

        $selectBoardId1 = banco\connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayer = banco\connectDB::getDb()->query ("SELECT IA, difficulty FROM player WHERE id_player = 1");

        $resultBoard = $selectBoardId1->fetch_object();
        $ResultPlayer = $selectPlayer->fetch_object();

        $setIaFalse = "UPDATE player SET IA = false WHERE id_player = 1";

        if ($ResultPlayer->difficulty == constants\Constants::VALOR_FACIL) {
            $ia = $ResultPlayer->IA;
            while ($ia == 1) {
                $attack->attack();
                $random = rand(1, 9);
                for ($j = 1; $j <= 9; $j++) {
                    $board = constants\Constants::STRING_TABULEIRO . $j;
                    if ($random == $j && $resultBoard->$board == $j) {
                        defaultIa\padrao_o($board);
                        $ia = null;
                    }
                }
                if (
                    $resultBoard->J1 != 1
                    && $resultBoard->J2 != 2
                    && $resultBoard->J3 != 3
                    && $resultBoard->J4 != 4
                    && $resultBoard->J5 != 5
                    && $resultBoard->J6 != 6
                    && $resultBoard->J7 != 7
                    && $resultBoard->J8 != 8
                    && $resultBoard->J9 != 9
                ) {
                    banco\connectDB::getDb()->query ($setIaFalse);
                }
            }
        }

        if ($ResultPlayer->difficulty == constants\Constants::VALOR_MEDIA && $ResultPlayer->IA == constants\Constants::VALOR_IA_ON)
        {
            $defend->defend();
            if ($ResultPlayer->IA == constants\Constants::VALOR_IA_ON) {
                $random = rand(1, 2);
                if ($random == 1 && $resultBoard->J9 == 9) {
                    defaultIa\padrao_o('J9');
                } elseif ($random == 2 && $resultBoard->J7 == 7) {
                    defaultIa\padrao_o('J7');
                } else {
                    for ($j = 0; $j <= 9; $j++) {
                        $board = constants\Constants::STRING_TABULEIRO . $j;
                        if (!$ResultPlayer->IA) {
                            break;
                        } elseif (
                            $resultBoard->$board == 3
                            || $resultBoard->$board == 1
                            || $resultBoard->$board == 4
                            || $resultBoard->$board == 8
                            || $resultBoard->$board == 6
                            || $resultBoard->$board == 2
                            || $resultBoard->$board == 5
                        ) {
                            defaultIa\padrao_o($board);
                        }
                    }
                }
            }
        }

        if ($ResultPlayer->difficulty == constants\Constants::VALOR_DIFICIL && $ResultPlayer->IA == constants\Constants::VALOR_IA_ON) {
            $attack->attack();
            $defend->defend();
            if ($ResultPlayer->IA == constants\Constants::VALOR_IA_ON) {
                for ($j = 0; $j <= 9; $j++) {
                    $board = constants\Constants::STRING_TABULEIRO . $j;
                    if (!$ResultPlayer->IA) {
                        break;
                    } elseif (
                        $resultBoard->$board == 9
                        || $resultBoard->$board == 1
                        || $resultBoard->$board == 3
                        || $resultBoard->$board == 7
                        || $resultBoard->$board == 4
                        || $resultBoard->$board == 8
                        || $resultBoard->$board == 6
                        || $resultBoard->$board == 2
                        || $resultBoard->$board == 5
                    ) {
                        defaultIa\padrao_o($board);
                        break;
                    }
                }
            }
        }
    }
}