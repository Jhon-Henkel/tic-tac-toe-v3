<?php
require_once '../Fim_jogo.php';
require_once 'Ataque.php';
require_once 'Defesa.php';
require_once 'Padrao.php';
//Jogadas da IA 'O'.
class Jogadas_IA {
    public function jogada_ia (): void {
        $fim = new Fim_jogo();
        $def = new Defesa();
        $ata = new Ataque();

        $fim->setJaGanho($_SESSION['X_fixo']);

        if ($_SESSION['dif'] == 1) {
            while ($_SESSION['ia'] == 1) {
                $ata->ataque_o();
                $r = rand(1, 9);
                for ($jxo=1; $jxo<=9; $jxo++) {
                    for ($jc = 0; $jc <= 2; $jc++) {
                        for ($jl = 0; $jl <= 2; $jl++) {
                            if ($r == $jxo && $_SESSION['j'][$jc][$jl] == $jxo) {
                                $_SESSION['j'][$jc][$jl] = $_SESSION['O_fixo'];
                                padrao_o();
                            }
                        }
                    }
                }
                if ($_SESSION['j'][0][0] != 1 &&
                    $_SESSION['j'][0][1] != 2 &&
                    $_SESSION['j'][0][2] != 3 &&
                    $_SESSION['j'][1][0] != 4 &&
                    $_SESSION['j'][1][1] != 5 &&
                    $_SESSION['j'][1][2] != 6 &&
                    $_SESSION['j'][2][0] != 7 &&
                    $_SESSION['j'][2][1] != 8 &&
                    $_SESSION['j'][2][2] != 9) {
                    $_SESSION['ia'] = false;
                }
            }
        }//final da dificuldade 1.

        if ($_SESSION['dif'] == 2 && $_SESSION['ia']) {
            $def->bloqueia();
            if ($_SESSION['ia'] == 1) {
                $r = rand(1, 2);
                if ($r == 1 && $_SESSION['j'][2][2] == 9) {
                    $_SESSION['j'][2][2] = $_SESSION['O_fixo'];
                    padrao_o();
                } elseif ($r == 2 && $_SESSION['j'][2][0] == 7) {
                    $_SESSION['j'][2][0] = $_SESSION['O_fixo'];
                    padrao_o();
                }else{
                    for ($jc = 0; $jc <=2; $jc++){
                        for ($jl = 0; $jl <=2; $jl++){
                            if (!$_SESSION['ia']){
                                break;
                            }elseif ($_SESSION['j'][$jc][$jl] == 3 || $_SESSION['j'][$jc][$jl] == 1 ||
                                $_SESSION['j'][$jc][$jl] == 4 || $_SESSION['j'][$jc][$jl] == 8 ||
                                $_SESSION['j'][$jc][$jl] == 6 || $_SESSION['j'][$jc][$jl] == 2 ||
                                $_SESSION['j'][$jc][$jl] == 5){
                                $_SESSION['j'][$jc][$jl] = $_SESSION['O_fixo'];
                                padrao_o();
                                break;
                            }
                        }
                    }
                }
            }
        }//final da dificuldade 2.

        if ($_SESSION['dif'] == 3 && $_SESSION['ia']) {
            $ata->ataque_o();
            $def->bloqueia();
            if ($_SESSION['ia'] == 1) {
                for ($jc = 0; $jc <=2; $jc++){
                    for ($jl = 0; $jl <=2; $jl++){
                        if (!$_SESSION['ia']){
                            break;
                        }elseif ($_SESSION['j'][$jc][$jl] == 9 || $_SESSION['j'][$jc][$jl] == 1 ||
                            $_SESSION['j'][$jc][$jl] == 3 || $_SESSION['j'][$jc][$jl] == 7 ||
                            $_SESSION['j'][$jc][$jl] == 4 || $_SESSION['j'][$jc][$jl] == 8 ||
                            $_SESSION['j'][$jc][$jl] == 6 || $_SESSION['j'][$jc][$jl] == 2 ||
                            $_SESSION['j'][$jc][$jl] == 5){
                            $_SESSION['j'][$jc][$jl] = $_SESSION['O_fixo'];
                            padrao_o();
                            break;
                        }
                    }
                }
            }
        }//final da dificuldade 3.
    }//jogadas de 'O'.
}