<?php
//coloca o valor passado pela tela home em uma variavel global.
class Qtd_player {

    public function __construct($player){
        if ($player == 1 || $player == 2) {
            require 'banco/banco.php';

            $b = $banco->query ("SELECT qtd_jog FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");

            if ($b->num_rows == 1) {
                $q1 = "UPDATE db_jogo_da_velha.jogador SET qtd_jog = '$player' WHERE id_jogador = 1";
                $banco->query($q1);
            }else {
                $q2 = "INSERT INTO db_jogo_da_velha.jogador (id_jogador, qtd_jog) VALUES ('1', '$player')";
                $banco->query($q2);
            }
        }
    }
}

