<?php
//cria o tabuleiro e faz a solicitação de jogadas.
class Tabuleiro {

    public function __construct($qi, $p, $dif) {
        require './banco/banco.php';

        $b = $banco->query ("SELECT tab_done FROM db_jogo_da_velha.tabuleiro");
        $reg = $b->fetch_object();

        if ($reg->tab_done == null) {
            $q1 = "INSERT INTO db_jogo_da_velha.tabuleiro (id_tab, tab_done) VALUES ('1', true)";
            $q2 = "INSERT INTO db_jogo_da_velha.tabuleiro (id_tab, J00, J01, J02, J10, J11, J12, J20, J21, J22) 
                   VALUES ('2', null, null, null, null, null, null, null, null, null)";
            $banco->query ($q1);
            $banco->query ($q2);
        }

        $this->qtd_jogador($p);
        $this->quem_inicia($qi, $p);
        $this->dificuldade($dif);
    }//Cria o Array do tabuleiro e numera as casas.

    public function tab (): void{
        require './banco/banco.php';

        $b1 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $b2 = $banco->query ("SELECT X_O, IA FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $b3 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 2");
        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();
        $reg3 = $b3->fetch_object();
        $xo = $xo ?? null;

        // form 1 = X.
        // form 0 = O.

        if ($reg2->X_O == 1 ){
            $q = "UPDATE db_jogo_da_velha.tabuleiro SET form = 1 WHERE id_tab = 1";
            $banco->query ($q);
            $xo = 'X';
        }elseif ($reg2->X_O == 2){
            $q = "UPDATE db_jogo_da_velha.tabuleiro SET form = 0 WHERE id_tab = 1";
            $banco->query ($q);
            $xo = 'O';
        }

        if ($reg2->X_O) {
            echo "Clique no local para '<b><span class='".strtolower($xo)."'>".$xo."</span></b>':</br>";
        }

        echo '<div class="background_grade"><hr class="linha_horizontal">';
            $k = 0;
            for ($jc = 0; $jc <= 2; $jc++) {
                for ($jl = 0; $jl <= 2; $jl++) {
                    $k++;
                    $r = 'J'.$jc.$jl;
                    if ($reg3->$r == 'X') {
                        $m = '<span class="x">'.$reg1->$r.'</span>';
                    }elseif ($reg3->$r == 'O') {
                        $m = '<span class="o">'.$reg1->$r.'</span>';
                    }else {
                        $m = $reg3->$r;
                    }
                    echo '<form class="btn" method="post" action="main.php">
                            <input type="hidden" name="'.$xo.'" value="'.$k.'">
                            <button class="btn" type="submit">'.$m.'</button>
                          </form>
                    ';
                }
            }
        echo '</div>';//função para exibir o tabuleiro com as posições.*/
    }

    public function quem_inicia($qi, $pl): void{
        require './banco/banco.php';

        /* $qi = quem inicia | 1 = X | 2 = O | 3 = Tanto faz
           $pl = quantidade de jogadores | 1 = single player | 2 = multiplayer */

        if ($qi == 3){
            if ($pl == 1) {
                $r = rand(1, 2);
                if ($r == 1){
                    $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '1', IA = null WHERE id_jogador = 1";
                }elseif ($r == 2){
                    $q = "UPDATE db_jogo_da_velha.jogador SET IA = '1', X_O = null WHERE id_jogador = 1";
                }
            }elseif ($pl == 2){
                $r = rand (1, 2);
                $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '$r' WHERE id_jogador = 1";
            }
        }elseif ($qi == 1){
            $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '1', IA = null WHERE id_jogador = 1";
        }elseif ($qi == 2){
            if ($pl == 1) {
                $q = "UPDATE db_jogo_da_velha.jogador SET IA = '1', X_O = null WHERE id_jogador = 1";
            }elseif ($pl == 2){
                $q = "UPDATE db_jogo_da_velha.jogador SET X_O = '2' WHERE id_jogador = 1";
            }
        }
        $q = $q ?? null;
        $banco->query ($q);
    }

    public function dificuldade ($dif): void{
        require './banco/banco.php';

        if ($dif == 1) {
            $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Extra-Fácil' WHERE id_jogador = 1";
        } elseif ($dif == 2) {
            $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Fácil' WHERE id_jogador = 1";
        } elseif ($dif == 3) {
            $q = "UPDATE db_jogo_da_velha.jogador SET dific = 'Média' WHERE id_jogador = 1";
        }
        $q = $q ?? null;
        $banco->query($q);
    }

    public function qtd_jogador ($player): void{
        if ($player == 1 || $player == 2) {
            require 'banco/banco.php';
            $q = "INSERT INTO db_jogo_da_velha.jogador (id_jogador, qtd_jog) VALUES ('1', '$player')";
            $banco->query($q);
        }
    }
}