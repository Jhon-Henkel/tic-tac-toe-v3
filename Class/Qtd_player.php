<?php
session_start ();
//coloca o valor passado pela tela home em uma variavel global.
class Qtd_player {

    public function __construct($player){
        if ($player == 1){
            $_SESSION ['p'] = 1;
        }elseif($player == 2){
            $_SESSION['p'] = 2;
        }
    }
}