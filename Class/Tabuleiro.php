<?php
//cria o tabuleiro e faz a solicitação de jogadas.
class Tabuleiro {

    public function __construct() {
        require './banco/banco.php';

        $b = $banco->query ("SELECT tab_done FROM db_jogo_da_velha.tabuleiro");
        $q = "INSERT INTO db_jogo_da_velha.tabuleiro (id_tab, tab_done) VALUES ('1', true)";
        $reg = $b->fetch_object();

        if ($reg->tab_done == null) {
            $banco->query ($q);
        }
    }//Cria o Array do tabuleiro e numera as casas.

    public function tab (): void{

        require 'banco/banco.php';

        $b1 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $b2 = $banco->query ("SELECT X_O FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");

        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();

        // form 1 = X.
        // form 0 = O.

        if ($reg2->X_O == 1 ){
            $q = "UPDATE db_jogo_da_velha.tabuleiro SET form = 1 WHERE id_tab = 1";
            $banco->query ($q);
        }elseif ($reg2->X_O == 2){
            $q = "UPDATE db_jogo_da_velha.tabuleiro SET form = 0 WHERE id_tab = 1";
            $banco->query ($q);
        }else{
            $q = "UPDATE db_jogo_da_velha.tabuleiro SET form = null WHERE id_tab = 1";
            $banco->query ($q);
        }

        if ($reg1->form == 1 || $reg1->form == 0) {
            if ($reg1->form == 1) {
                $xo = 'X';
            }elseif ($reg1->form == 0) {
                $xo = 'O';
            }
            echo "Clique no local para '<b><span class='".strtolower($xo)."'>".$xo."</span></b>':</br>";
        }//solicita as jogadas de 'X' e 'O'.*/

        echo '<div class="background_grade"><hr class="linha_horizontal">';
            $k = 0;
            for ($i = 0; $i <= 2; $i++) {
                for ($j = 0; $j <= 2; $j++) {
                    $k++;
                    $r = 'J'.$i.$j;
                    echo '<form class="btn" method="post" action="main.php">
                            <input type="hidden" name="'.$reg1->form.'" value="' . $k . '">
                            <button class="btn" type="submit">'.$reg1->$r.'</button>
                          </form>
                    ';
                }
            }
        echo '</div>';//função para exibir o tabuleiro com as posições.*/
    }

}