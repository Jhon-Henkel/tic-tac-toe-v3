<?php
// responsavel por marcar as jogadas do usuario.
class Jogada_User {

    public function play($v): void{

        require '../../banco/banco.php';

        $b1 = $banco->query ("SELECT X_O FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $b2 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");

        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();

        $q1 = "UPDATE db_jogo_da_velha.tabuleiro SET deu_velha = deu_velha +1 WHERE id_tab = 1";
        $q2 = "UPDATE db_jogo_da_velha.jogador SET X_O = false, IA = 1 WHERE id_jogador = 1";
        $q3 = "UPDATE db_jogo_da_velha.jogador SET X_O = 2 WHERE id_jogador = 1";
        $q4 = "UPDATE db_jogo_da_velha.jogador SET X_O = 1 WHERE id_jogador = 1";

        for ($jxo=1; $jxo<=9; $jxo++) {
            for ($jc = 0; $jc <= 2; $jc++) {
                for ($jl = 0; $jl <= 2; $jl++) {
                    if ($v == $jxo && $reg2->J.$jc.$jl == $jxo) {

                        $r = 'J'.$jc.$jl;

                        $q5 = "UPDATE db_jogo_da_velha.tabuleiro SET ".$r." = ".$_SESSION['X_fixo']." WHERE id_tab = 1";
                        $q6 = "UPDATE db_jogo_da_velha.tabuleiro SET ".$r." = ".$_SESSION['O_fixo']." WHERE id_tab = 1";

                        //ideia: trocar de j00, j01, j02 para 1, 2, 3...
                        //Ver o que tudo seria afetado.

                        if ($reg1->qtd_jog == 1 && $reg1->X_O == 1) {
                            $banco->query ($q1);
                            $banco->query ($q2);
                            $banco->query ($q5);
                        }elseif ($reg1->qtd_jog == 2 && $reg1->X_O == 1){
                            $banco->query ($q1);
                            $banco->query ($q3);
                            $banco->query ($q5);
                        }elseif ($reg1->qtd_jog == 2 && $reg1->X_O == 2){
                            $banco->query ($q1);
                            $banco->query ($q4);
                            $banco->query ($q6);
                        }
                    }
                }
            }
        }
    }
}