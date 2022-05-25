<?php
require_once 'Default.php';
class Attack 
{
    function attack (): void
    {
        require '../../src/banco/DataBase.php';

        $selectBoard = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayer = connectDB::getDb()->query ("SELECT IA FROM player WHERE id_player = 1");
        $resultBoard = $selectBoard->fetch_object();
        $resultPlayer = $selectPlayer->fetch_object();

        $player = 'O';
        
        if ($resultPlayer->IA == 1) {
            if ($resultBoard->J1 == $player && $resultBoard->J2 == $player && $resultBoard->J3 == 3) {
                padrao_o('J3');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J3 == $player && $resultBoard->J1 == 1) {
                padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J3 == $player && $resultBoard->J2 == 2) {
                padrao_o('J2');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J5 == $player && $resultBoard->J6 == 6) {
                padrao_o('J6');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J6 == $player && $resultBoard->J4 == 4) {
                padrao_o('J4');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J6 == $player && $resultBoard->J5 == 5) {
                padrao_o('J5');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J8 == $player && $resultBoard->J9 == 9) {
                padrao_o('J9');
            } elseif ($resultBoard->J8 == $player && $resultBoard->J9 == $player && $resultBoard->J7 == 7) {
                padrao_o('J7');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J9 == $player && $resultBoard->J8 == 8) {
                padrao_o('J8');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J4 == $player && $resultBoard->J7 == 7) {
                padrao_o('J7');
            } elseif ($resultBoard->J4 == $player && $resultBoard->J7 == $player && $resultBoard->J1 == 1) {
                padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J7 == $player && $resultBoard->J4 == 4) {
                padrao_o('J4');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J5 == $player && $resultBoard->J8 == 8) {
                padrao_o('J8');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J8 == $player && $resultBoard->J2 == 2) {
                padrao_o('J2');
            } elseif ($resultBoard->J2 == $player && $resultBoard->J8 == $player && $resultBoard->J5 == 5) {
                padrao_o('J5');
            } elseif ($resultBoard->J3 == $player && $resultBoard->J6 == $player && $resultBoard->J9 == 9) {
                padrao_o('J9');
            } elseif ($resultBoard->J6 == $player && $resultBoard->J9 == $player && $resultBoard->J3 == 3) {
                padrao_o('J3');
            } elseif ($resultBoard->J3 == $player && $resultBoard->J9 == $player && $resultBoard->J6 == 6) {
                padrao_o('J6');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J5 == $player && $resultBoard->J9 == 9) {
                padrao_o('J9');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J9 == $player && $resultBoard->J1 == 1) {
                padrao_o('J1');
            } elseif ($resultBoard->J1 == $player && $resultBoard->J9 == $player && $resultBoard->J5 == 5) {
                padrao_o('J5');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J5 == $player && $resultBoard->J3 == 3) {
                padrao_o('J3');
            } elseif ($resultBoard->J5 == $player && $resultBoard->J3 == $player && $resultBoard->J7 == 7) {
                padrao_o('J7');
            } elseif ($resultBoard->J7 == $player && $resultBoard->J3 == $player && $resultBoard->J5 == 5) {
                padrao_o('J5');
            }
        }
    }//cria ataques contra X.
}