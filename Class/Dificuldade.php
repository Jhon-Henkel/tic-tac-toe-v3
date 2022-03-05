<?php
session_start();
// armazena a dificuldade escolhida em uma variavel global e dá nome.
class Dificuldade {

    public function __construct ($dif){
        if ($dif == 1) {
            $_SESSION ['dif'] = 1;
            $_SESSION ['dificuldade'] = "Extra-Fácil.";
        } elseif ($dif == 2) {
            $_SESSION ['dif'] = 2;
            $_SESSION ['dificuldade'] = "Fácil.";
        } elseif ($dif == 3) {
            $_SESSION ['dif'] = 3;
            $_SESSION ['dificuldade'] = "Média";
        }
    }
}