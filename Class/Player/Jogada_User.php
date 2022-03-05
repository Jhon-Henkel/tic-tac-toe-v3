<?php
// responsavel por marcar as jogadas do usuario.
class Jogada_User {

    public function play($v): void{
        for ($jxo=1; $jxo<=9; $jxo++) {
            for ($jc = 0; $jc <= 2; $jc++) {
                for ($jl = 0; $jl <= 2; $jl++) {
                    if ($v == $jxo && $_SESSION['j'][$jc][$jl] == $jxo) {
                        if ($_SESSION['p'] == 1 && $_SESSION['x/o'] == 1) {
                            $_SESSION['j'][$jc][$jl] = $_SESSION['X_fixo'];
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = false;
                            $_SESSION['ia'] = 1;
                        }elseif ($_SESSION['p'] == 2 && $_SESSION['x/o'] == 1){
                            $_SESSION['j'][$jc][$jl] = $_SESSION['X_fixo'];
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = 2;
                        }elseif ($_SESSION['p'] == 2 && $_SESSION['x/o'] == 2){
                            $_SESSION['j'][$jc][$jl] = $_SESSION['O_fixo'];
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = 1;
                        }
                    }
                }
            }
        }
    }
}