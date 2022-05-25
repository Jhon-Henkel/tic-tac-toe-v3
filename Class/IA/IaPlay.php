<?php
require_once 'Attack.php';
require_once 'Defend.php';
require_once 'Default.php';
//Jogadas da IA 'O'.
class IaPlay
{
    public function IaPlay (): void
    {
        require '../../src/banco/DataBase.php';

        $end    = new EndGame();
        $defend = new Defend();
        $attack = new Attack();

        $end->setHaveWin('X');

        $selectBoardId1 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayer = connectDB::getDb()->query ("SELECT IA, difficulty FROM player WHERE id_player = 1");

        $resultBoard = $selectBoardId1->fetch_object();
        $ResultPlayer = $selectPlayer->fetch_object();

        $setIaFalse = "UPDATE player SET IA = false WHERE id_player = 1";

        if ($ResultPlayer->dific == 1) {
            $ia = $ResultPlayer->IA;
            while ($ia == 1) {
                $attack->attack();
                $random = rand(1, 9);
                for ($j = 1; $j <= 9; $j++) {
                    $board = 'J'.$j;
                    if ($random == $j && $resultBoard->$board == $j) {
                        padrao_o($board);
                        $ia = null;
                    }
                }
                if (
                    $resultBoard->J00 != 1
                    && $resultBoard->J01 != 2
                    && $resultBoard->J02 != 3
                    && $resultBoard->J10 != 4
                    && $resultBoard->J11 != 5
                    && $resultBoard->J12 != 6
                    && $resultBoard->J20 != 7
                    && $resultBoard->J21 != 8
                    && $resultBoard->J22 != 9
                ) {
                    connectDB::getDb()->query ($setIaFalse);
                }
            }
        }//final da dificuldade 1.

        if ($ResultPlayer->dific == 2 && $ResultPlayer->IA == 1)
        {
            $defend->defend();
            if ($ResultPlayer->IA == 1) {
                $random = rand(1, 2);
                if ($random == 1 && $resultBoard->J9 == 9) {
                    padrao_o('J9');
                } elseif ($random == 2 && $resultBoard->J7 == 7) {
                    padrao_o('J7');
                } else {
                    for ($j = 0; $j <= 9; $j++) {
                        $board = 'J'.$j;
                        if ($ResultPlayer->IA == null) {
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
                            padrao_o($board);
                        }
                    }
                }
            }
        }//final da dificuldade 2.

        if ($ResultPlayer->dific == 3 && $ResultPlayer->IA == 1) {
            $attack->attack();
            $defend->defend();
            if ($ResultPlayer->IA == 1) {
                for ($j = 0; $j <= 9; $j++) {
                    $board = 'J'.$j;
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
                        padrao_o($board);
                        break;
                    }
                }
            }
        }//final da dificuldade 3.
    }//jogadas de 'O'.
}