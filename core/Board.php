<?php

namespace board;

require_once __DIR__ . '/../config/Constants.php';
require_once __DIR__ . '/../src/banco/DataBase.php';

use dataBase\DataBase;
use constants\config;

class Board
{

    public function __construct($whoStart, $player)
    {
        $this->whoStart($whoStart, $player);
    }

    public function board (): void
    {
        $selectBoardId1 = DataBase::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayerId1 = DataBase::getDb()->query ("SELECT X_O, IA FROM player WHERE id_player = 1");
        $selectBoardId2 = DataBase::getDb()->query ("SELECT * FROM board WHERE id_board = 2");
        $resultsBoardId1 = $selectBoardId1->fetch_object();
        $resultsBoardId2 = $selectBoardId2->fetch_object();
        $whoPlay = $selectPlayerId1->fetch_object();
        $xo = $xo ?? null;

        if ($whoPlay->X_O == config::VALOR_X) {
            $updateFormPlayer = "UPDATE board SET form = 1 WHERE id_board = 1";
            DataBase::getDb()->query ($updateFormPlayer);
            $xo = config::STRING_X;
        } elseif ($whoPlay->X_O == config::VALOR_O) {
            $updateFormPlayer = "UPDATE board SET form = 0 WHERE id_board = 1";
            DataBase::getDb()->query ($updateFormPlayer);
            $xo = config::STRING_O;
        }

        if ($whoPlay->X_O) {
            ?>
                Clique no local para <b><span class='<?php echo strtolower($xo) ?>'> <?php echo $xo ?> </span></b>:</br>
            <?php
        }

        ?>
            <div class="background_grade"><hr class="linha_horizontal">
        <?php

        for ($position = 1; $position <= 9; $position++) {
            $boardField = config::STRING_TABULEIRO . $position;
            if ($resultsBoardId2->$boardField == config::STRING_X) {
                $field = '<span class="x">' . $resultsBoardId1->$boardField . '</span>';
            }elseif ($resultsBoardId2->$boardField == config::STRING_O) {
                $field = '<span class="o">' . $resultsBoardId1->$boardField . '</span>';
            }else {
                $field = $resultsBoardId2->$boardField;
            }

            ?>
            <form class="btn" name="formPlay" ng-controller="ticTacToeLetsPlayCtrl">
                <input type="hidden" ng-init="play.<?php echo $xo ?> = <?php echo $position ?>">
                <button class="btn" ng-on-click="sendPlay(play)"> <?php echo $field ?></button>
            </form>
            <?php
            }
        ?>
            </div>
        <?php
    }

    public function whoStart($whoStart, $player): void
    {
        if ($whoStart == config::VALOR_TANTO_FAZ) {
            if ($player == config::VALOR_SINGLE_PLAYER) {
                $random = rand(1, 2);
                if ($random == 1) {
                    $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
                } elseif ($random == 2) {
                    $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
                }
            } elseif ($player == config::VALOR_MULTI_PLAYER) {
                $random = rand (1, 2);
                $updateWhoStart = "UPDATE player SET X_O = '$random' WHERE id_player = 1";
            }
        } elseif ($whoStart == config::VALOR_X) {
            $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
        } elseif ($whoStart == config::VALOR_O) {
            if ($player == config::VALOR_SINGLE_PLAYER) {
                $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
            } elseif ($player == config::VALOR_MULTI_PLAYER) {
                $updateWhoStart = "UPDATE player SET X_O = '2' WHERE id_player = 1";
            }
        }
        $updateWhoStart = $updateWhoStart ?? null;
        DataBase::getDb()->query ($updateWhoStart);
    }
}