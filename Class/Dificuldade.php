<?php
// armazena a dificuldade escolhida em uma variavel global e dá nome.
class Dificuldade {

    public function __construct ($dif){

        require './banco/banco.php';

        $b = $banco->query ("SELECT dific FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");

        if ($dif == 1) {
            if ($b->num_rows == 1) {
                $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Extra-Fácil' WHERE id_jogador = 1";
            }
        } elseif ($dif == 2) {
            if ($b->num_rows == 1) {
                $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Fácil' WHERE id_jogador = 1";
            }
        } elseif ($dif == 3) {
            if ($b->num_rows == 1) {
                $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Média' WHERE id_jogador = 1";
            }
        }
        $banco->query($q);
    }
}