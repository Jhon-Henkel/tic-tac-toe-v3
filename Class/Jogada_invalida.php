<?php
//javascript de jogada inválida.
class Jogada_invalida {

    function jogadaInvalida ($x, $o): void {

        require './banco/banco.php';

        $b = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $q = "UPDATE db_jogo_da_velha.jogador SET IA = false WHERE id_jogador = 1";

        $reg = $b->fetch_object();

        $xo = 1;
        for ($jc = 0; $jc <=2; $jc++){
            for ($jl = 0; $jl <=2; $jl++){
                if ($x == $xo && $reg->J.$jc.$jl == $_SESSION['X_fixo'] ||
                    $x == $xo && $reg->J.$jc.$jl == $_SESSION['O_fixo'] ||
                    $o == $xo && $reg->J.$jc.$jl == $_SESSION['X_fixo'] ||
                    $o == $xo && $reg->J.$jc.$jl == $_SESSION['O_fixo'] ){
                    echo '<script type="text/javascript">alert("Jogada inválida, o lugar que você escolheu está ocupada!!!");</script>';
                    $banco->query ($q);
                }
                $xo++;
            }
        }
    }
}