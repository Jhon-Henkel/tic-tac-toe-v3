<?php
namespace invalidPlay;

require_once __DIR__ . '/../config/Constants.php';
require_once __DIR__ . '/../src/banco/DataBase.php';

use dataBase;
use constants;

class InvalidPlay
{
    function jogadaInvalida ($x, $o): void
    {
        $selectBoardId1 = dataBase\DataBase::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $updateIaFalse = "UPDATE player SET IA = false WHERE id_player = 1";
        $resultsSelectBoard = $selectBoardId1->fetch_object();

        for ($j = 1; $j <= 9; $j++) {
            $boardField = constants\config::STRING_TABULEIRO . $j;
            if (
                $x == $j && $resultsSelectBoard->$boardField == constants\config::STRING_X
                || $x == $j && $resultsSelectBoard->$boardField == constants\config::STRING_O
                || $o == $j && $resultsSelectBoard->$boardField == constants\config::STRING_X
                || $o == $j && $resultsSelectBoard->$boardField == constants\config::STRING_O
            ) {
                ?>
                <script>
                    alert("Jogada inválida, o lugar que você escolheu está ocupado!!!");
                </script>
                <?php
                dataBase\DataBase::getDb()->query ($updateIaFalse);
            }
        }
    }
}