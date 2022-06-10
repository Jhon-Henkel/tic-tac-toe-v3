<?php

namespace defaultIa;

include_once __DIR__ . '/../../config/Constants.php';
include_once __DIR__ . '/../../src/banco/DataBase.php';

use banco;
use constants;

function padrao_o ($boardField): void
{
    $selectGotOld = banco\connectDB::getDb()->query ("SELECT got_old FROM board WHERE id_board = 1");
    $selectIa = banco\connectDB::getDb()->query ("SELECT IA FROM player WHERE id_player = 1");
    $resultGotOld = $selectGotOld->fetch_object();
    $resultIa = $selectIa->fetch_object();

    $updateXoPlay = "UPDATE player SET X_O = 1, IA = null WHERE id_player = 1";
    $updateOTab1 = "UPDATE board SET " . $boardField . " = 'O' WHERE id_board = 1";
    $updateOTab2 = "UPDATE board SET " . $boardField . " = 'O' WHERE id_board = 2";

    if (is_null($resultGotOld->got_old)) {
        $updateGotOld = "UPDATE board SET got_old = 1 WHERE id_board = 1";
    } else {
        $updateGotOld = "UPDATE board SET got_old = got_old +1 WHERE id_board = 1";
    }

    if ($resultIa->IA == constants\Constants::VALOR_IA_ON) {
        banco\connectDB::getDb()->query($updateXoPlay);
        banco\connectDB::getDb()->query($updateOTab1);
        banco\connectDB::getDb()->query($updateOTab2);
        banco\connectDB::getDb()->query($updateGotOld);
    }
}