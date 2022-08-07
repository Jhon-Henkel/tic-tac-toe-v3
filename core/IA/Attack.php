<?php

namespace attack;

require_once __DIR__ . '/Defend.php';
require_once __DIR__ . '/../../config/Constants.php';
require_once __DIR__ . '/../../src/banco/DataBase.php';

use dataBase;
use defaultIa;
use constants;

class Attack
{
    function attack (): void
    {
        $selectBoard = dataBase\DataBase::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayer = dataBase\DataBase::getDb()->query ("SELECT IA FROM player WHERE id_player = 1");
        $resultBoard = $selectBoard->fetch_object();
        $resultPlayer = $selectPlayer->fetch_object();

        $player = constants\config::STRING_O;
        
        if ($resultPlayer->IA == constants\config::VALOR_IA_ON) {
            if ($resultBoard->J1 == $player && $resultBoard->J2 == $player && $resultBoard->J3 == 3) {
                defaultIa\padrao_o('J3');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J3 == $player && $resultBoard->J1 == 1) {
                defaultIa\padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J3 == $player && $resultBoard->J2 == 2) {
                defaultIa\padrao_o('J2');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J5 == $player && $resultBoard->J6 == 6) {
                defaultIa\padrao_o('J6');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J6 == $player && $resultBoard->J4 == 4) {
                defaultIa\padrao_o('J4');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J6 == $player && $resultBoard->J5 == 5) {
                defaultIa\padrao_o('J5');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J8 == $player && $resultBoard->J9 == 9) {
                defaultIa\padrao_o('J9');
            } elseif ($resultBoard->J8 == $player && $resultBoard->J9 == $player && $resultBoard->J7 == 7) {
                defaultIa\padrao_o('J7');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J9 == $player && $resultBoard->J8 == 8) {
                defaultIa\padrao_o('J8');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J4 == $player && $resultBoard->J7 == 7) {
                defaultIa\padrao_o('J7');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J7 == $player && $resultBoard->J1 == 1) {
                defaultIa\padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J7 == $player && $resultBoard->J4 == 4) {
                defaultIa\padrao_o('J4');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J5 == $player && $resultBoard->J8 == 8) {
                defaultIa\padrao_o('J8');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J8 == $player && $resultBoard->J2 == 2) {
                defaultIa\padrao_o('J2');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J8 == $player && $resultBoard->J5 == 5) {
                defaultIa\padrao_o('J5');
            } elseif ($resultBoard->J3 == $player && $resultBoard->J6 == $player && $resultBoard->J9 == 9) {
                defaultIa\padrao_o('J9');
            } elseif ($resultBoard->J6 == $player && $resultBoard->J9 == $player && $resultBoard->J3 == 3) {
                defaultIa\padrao_o('J3');
            } elseif ($resultBoard->J3 == $player && $resultBoard->J9 == $player && $resultBoard->J6 == 6) {
                defaultIa\padrao_o('J6');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J5 == $player && $resultBoard->J9 == 9) {
                defaultIa\padrao_o('J9');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J9 == $player && $resultBoard->J1 == 1) {
                defaultIa\padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J9 == $player && $resultBoard->J5 == 5) {
                defaultIa\padrao_o('J5');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J5 == $player && $resultBoard->J3 == 3) {
                defaultIa\padrao_o('J3');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J3 == $player && $resultBoard->J7 == 7) {
                defaultIa\padrao_o('J7');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J3 == $player && $resultBoard->J5 == 5) {
                defaultIa\padrao_o('J5');
            }
        }
    }
}