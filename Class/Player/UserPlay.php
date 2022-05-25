<?php
// responsavel por marcar as jogadas do usuario.
class UserPlay
{
    public function play($play): void
    {
        require '../../src/banco/DataBase.php';

        $selectPlayer = connectDB::getDb()->query ("SELECT * FROM player WHERE id_player = 1");
        $selectBoardId1 = connectDB::getDb()->query ("SELECT * FROM boaard WHERE id_board = 1");
        $resultsPlayer = $selectPlayer->fetch_object();
        $resultsBoard = $selectBoardId1->fetch_object();

        //X_O 1 = X.
        //X_O 2 = O.

        if (is_null($resultsBoard->deu_velha)) {
            $gotOld = "UPDATE board SET got_old = 1 WHERE id_board = 1";
        } else {
            $gotOld = "UPDATE board SET got_old = got_old +1 WHERE id_board = 1";
        }

        $setXoNullIaTrue = "UPDATE player SET X_O = null, IA = 1 WHERE id_player = 1";
        $setXTrue = "UPDATE player SET X_O = 1 WHERE id_player = 1";
        $setOTrue = "UPDATE player SET X_O = 2 WHERE id_player = 1";

        for ($j = 1; $j <= 9; $j++) {
            $tab = 'J'.$j;
            if ($play == $j && $resultsBoard->$tab == $j) {
                $updateXBoardId1 = "UPDATE board SET " . $tab . " = 'X' WHERE id_board = 1";
                $updateOBoardId1 = "UPDATE board SET " . $tab . " = 'O' WHERE id_board = 1";
                $updateXBoardId2 = "UPDATE board SET " . $tab . " = 'X' WHERE id_board = 2";
                $updateOBoardId2 = "UPDATE board SET " . $tab . " = 'O' WHERE id_board = 2";
                if ($resultsPlayer->qtd_jog == 1 && $resultsPlayer->X_O == 1) {
                    connectDB::getDb()->query ($gotOld);
                    connectDB::getDb()->query ($setXoNullIaTrue);
                    connectDB::getDb()->query ($updateXBoardId1);
                    connectDB::getDb()->query ($updateXBoardId2);
                    break;
                }elseif ($resultsPlayer->qtd_jog == 2 && $resultsPlayer->X_O == 1) {
                    connectDB::getDb()->query ($updateXBoardId1);
                    connectDB::getDb()->query ($gotOld);
                    connectDB::getDb()->query ($setOTrue);
                    connectDB::getDb()->query ($updateXBoardId2);
                    break;
                }elseif ($resultsPlayer->qtd_jog == 2 && $resultsPlayer->X_O == 2) {
                    connectDB::getDb()->query ($updateOBoardId1);
                    connectDB::getDb()->query ($gotOld);
                    connectDB::getDb()->query ($setXTrue);
                    connectDB::getDb()->query ($updateOBoardId2);
                    break;
                }
            }
        }
    }
}