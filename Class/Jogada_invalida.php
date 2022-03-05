<?php
session_start();
//javascript de jogada inválida.
class Jogada_invalida {

    function jogadaInvalida ($x, $o): void {
        $xo = 1;
        for ($jc = 0; $jc <=2; $jc++){
            for ($jl = 0; $jl <=2; $jl++){
                if ($x == $xo && $_SESSION['j'][$jc][$jl] == $_SESSION['X_fixo'] ||
                    $x == $xo && $_SESSION['j'][$jc][$jl] == $_SESSION['O_fixo'] ||
                    $o == $xo && $_SESSION['j'][$jc][$jl] == $_SESSION['X_fixo'] ||
                    $o == $xo && $_SESSION['j'][$jc][$jl] == $_SESSION['O_fixo'] ){
                    echo '<script type="text/javascript">alert("Jogada inválida, o lugar que você escolheu está ocupada!!!");</script>';
                    $_SESSION['ia'] = false;
                }
                $xo++;
            }
        }
    }
}