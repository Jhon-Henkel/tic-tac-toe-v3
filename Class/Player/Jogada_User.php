<?php
// responsavel por marcar as jogadas do usuario.
class Jogada_User {

    public function play($v): void{
        require '././banco/banco.php';

        $b1 = $banco->query ("SELECT * FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $b2 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();

        //X_O 2 = O.
        //X_O 1 = X.

        if (is_null($reg2->deu_velha)) {
            $q1 = "UPDATE db_jogo_da_velha.tabuleiro SET deu_velha = 1 WHERE id_tab = 1";
        }else {
            $q1 = "UPDATE db_jogo_da_velha.tabuleiro SET deu_velha = deu_velha +1 WHERE id_tab = 1";
        }

        $q2 = "UPDATE db_jogo_da_velha.jogador SET X_O = null, IA = 1 WHERE id_jogador = 1";
        $q3 = "UPDATE db_jogo_da_velha.jogador SET X_O = 2 WHERE id_jogador = 1";
        $q4 = "UPDATE db_jogo_da_velha.jogador SET X_O = 1 WHERE id_jogador = 1";

        $jxo = 0;
        for ($jc = 0; $jc <= 2; $jc++) {
            for ($jl = 0; $jl <= 2; $jl++) {
                $jxo++;
                $tab = 'J'.$jc.$jl;
                if ($v == $jxo && $reg2->$tab == $jxo) {
                    $q5 = "UPDATE db_jogo_da_velha.tabuleiro SET $tab = 'X' WHERE id_tab = 1";
                    $q6 = "UPDATE db_jogo_da_velha.tabuleiro SET $tab = 'O' WHERE id_tab = 1";
                    $q7 = "UPDATE db_jogo_da_velha.tabuleiro SET $tab = 'X' WHERE id_tab = 2";
                    $q8 = "UPDATE db_jogo_da_velha.tabuleiro SET $tab = 'O' WHERE id_tab = 2";
                    if ($reg1->qtd_jog == 1 && $reg1->X_O == 1) {
                        $banco->query ($q1);
                        $banco->query ($q2);
                        $banco->query ($q5);
                        $banco->query ($q7);
                        break;
                    }elseif ($reg1->qtd_jog == 2 && $reg1->X_O == 1){
                        $banco->query ($q5);
                        $banco->query ($q1);
                        $banco->query ($q3);
                        $banco->query ($q7);
                        break;
                    }elseif ($reg1->qtd_jog == 2 && $reg1->X_O == 2){
                        $banco->query ($q6);
                        $banco->query ($q1);
                        $banco->query ($q4);
                        $banco->query ($q8);
                        break;
                    }
                }
            }
        }
    }
}