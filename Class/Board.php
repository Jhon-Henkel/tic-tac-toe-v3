<?php

namespace board;

include_once __DIR__ . '/../config/Constants.php';
include_once __DIR__ . '/../src/banco/DataBase.php';

use banco\connectDb;
use constants\Constants;

class Board
{

    public function __construct($whoStart, $player)
    {
        $this->whoStart($whoStart, $player);
    }

    public function board (): void
    {
        $selectBoardId1 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayerId1 = connectDB::getDb()->query ("SELECT X_O, IA FROM player WHERE id_player = 1");
        $selectBoardId2 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 2");
        $resultsBoardId1 = $selectBoardId1->fetch_object();
        $resultsBoardId2 = $selectBoardId2->fetch_object();
        $whoPlay = $selectPlayerId1->fetch_object();
        $xo = $xo ?? null;

        if ($whoPlay->X_O == Constants::VALOR_X) {
            $updateFormPlayer = "UPDATE board SET form = 1 WHERE id_board = 1";
            connectDB::getDb()->query ($updateFormPlayer);
            $xo = Constants::STRING_X;
        } elseif ($whoPlay->X_O == Constants::VALOR_O) {
            $updateFormPlayer = "UPDATE board SET form = 0 WHERE id_board = 1";
            connectDB::getDb()->query ($updateFormPlayer);
            $xo = Constants::STRING_O;
        }

        if ($whoPlay->X_O) {
            ?>
                Clique no local para <b><span class='<?php echo strtolower($xo) ?>'> <?php echo $xo ?> </span></b>':</br>
            <?php
        }

        ?>
            <div class="background_grade"><hr class="linha_horizontal">
        <?php

        for ($position = 1; $position <= 9; $position++) {
            $boardField = Constants::STRING_TABULEIRO . $position;
            if ($resultsBoardId2->$boardField == Constants::STRING_X) {
                $field = '<span class="x">' . $resultsBoardId1->$boardField . '</span>';
            }elseif ($resultsBoardId2->$boardField == Constants::STRING_O) {
                $field = '<span class="o">' . $resultsBoardId1->$boardField . '</span>';
            }else {
                $field = $resultsBoardId2->$boardField;
            }

            ?>
            <form class="btn" method="post" action="../view/lets-play.php">
                <input type="hidden" name="X" value="<?php echo $position ?>">
                <button class="btn" type="submit"> <?php echo $field ?></button>
            </form>
            <?php
            }
        ?>
            </div>
        <?php
    }

    public function whoStart($whoStart, $player): void
    {
        if ($whoStart == Constants::VALOR_TANTO_FAZ) {
            if ($player == Constants::VALOR_SINGLE_PLAYER) {
                $random = rand(1, 2);
                if ($random == 1) {
                    $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
                } elseif ($random == 2) {
                    $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
                }
            } elseif ($player == Constants::VALOR_MULTI_PLAYER) {
                $random = rand (1, 2);
                $updateWhoStart = "UPDATE player SET X_O = '$random' WHERE id_player = 1";
            }
        } elseif ($whoStart == Constants::VALOR_X) {
            $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
        } elseif ($whoStart == Constants::VALOR_O) {
            if ($player == Constants::VALOR_SINGLE_PLAYER) {
                $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
            } elseif ($player == Constants::VALOR_MULTI_PLAYER) {
                $updateWhoStart = "UPDATE player SET X_O = '2' WHERE id_player = 1";
            }
        }
        $updateWhoStart = $updateWhoStart ?? null;
        connectDB::getDb()->query ($updateWhoStart);
    }
}