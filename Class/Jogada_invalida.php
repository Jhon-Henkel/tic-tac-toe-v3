<?php
//javascript de jogada inválida.
class Jogada_invalida
{

    function jogadaInvalida ($x, $o): void
    {
        require './banco/banco.php';

        $b = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $q = "UPDATE db_jogo_da_velha.jogador SET IA = false WHERE id_jogador = 1";

        $reg = $b->fetch_object();

        $xo = 0;
        for ($jc = 0; $jc <=2; $jc++)
        {
            for ($jl = 0; $jl <=2; $jl++)
            {
                $tab = 'J'.$jc.$jl;
                $xo++;
                if ($x == $xo && $reg->$tab == 'X' ||
                    $x == $xo && $reg->$tab == 'O' ||
                    $o == $xo && $reg->$tab == 'X' ||
                    $o == $xo && $reg->$tab == 'O' )
                {
                    echo '<script type="text/javascript">alert("Jogada inválida, o lugar que você escolheu está ocupado!!!");</script>';
                    $banco->query ($q);
                }
            }
        }
    }
}