<?php

function padrao_o ($boardField): void
{
    require '../../src/banco/DataBase.php';

    $selectGotOld = connectDB::getDb()->query ("SELECT got_old FROM board WHERE id_board = 1");
    $selectIa = connectDB::getDb()->query ("SELECT IA FROM player WHERE id_player = 1");
    $resultGotOld = $selectGotOld->fetch_object();
    $resultIa = $selectIa->fetch_object();

    $updateXoPlay = "UPDATE player SET X_O = 1, IA = null WHERE id_player = 1";
    $updateOTab1 = "UPDATE board SET " . $boardField . " = 'O' WHERE id_board = 1";
    $updateOTab2 = "UPDATE board SET " . $boardField . " = 'O' WHERE id_board = 2";

    if (is_null($resultGotOld->deu_velha)) {
        $updateGotOld = "UPDATE board SET got_old = 1 WHERE id_board = 1";
    } else {
        $updateGotOld = "UPDATE board SET got_old = got_old +1 WHERE id_board = 1";
    }

    if ($resultIa->IA == 1) {
        connectDB::getDb()->query($updateXoPlay);
        connectDB::getDb()->query($updateOTab1);
        connectDB::getDb()->query($updateOTab2);
        connectDB::getDb()->query($updateGotOld);
    }
}//código padrão de todas as jogadas de O, que soma o deu velha, coloca ia como false e o/x como 1.