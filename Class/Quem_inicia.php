<?php
//define quem inicia o jogo.
class Quem_inicia {

    public function __construct($qi, $pl){

        require 'banco/banco.php';

        /*$qi
            1 = X
            2 = O
            3 = Tanto faz
          $pl
            1 = single player
            2 = multiplayer*/

        $b = $banco->query ("SELECT X_O, IA FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");

        if ($qi == 3){
            if ($pl == 1) {
                $r = rand(1, 2);
                if ($r == 1){
                    if ($b->num_rows == 1) {
                        $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '1' WHERE id_jogador = 1";
                    }
                }elseif ($r == 2){
                    if ($b->num_rows == 1) {
                        $q = "UPDATE db_jogo_da_velha.jogador SET IA = '1' WHERE id_jogador = 1";
                    }
                }
            }elseif ($pl == 2){
                $r = rand (1, 2);
                if ($b->num_rows == 1) {
                    $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '$r' WHERE id_jogador = 1";
                }
            }
        }elseif ($qi == 1){
            if ($b->num_rows == 1) {
                $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '1' WHERE id_jogador = 1";
            }
        }elseif ($qi == 2){
            if ($pl == 1) {
                if ($b->num_rows == 1) {
                    $q = "UPDATE db_jogo_da_velha.jogador SET IA = '1' WHERE id_jogador = 1";
                }
            }elseif ($pl == 2){
                if ($b->num_rows == 1) {
                    $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '2' WHERE id_jogador = 1";
                }
            }
        }
        $banco->query ($q);
    }
}