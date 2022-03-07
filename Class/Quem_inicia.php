<?php
//define quem inicia o jogo.
class Quem_inicia {

    public function __construct($qi){
        if ($qi == 3){
            if ($_SESSION['p'] == 1) {
                $r = rand(1, 2);
                if ($r == 1){
                    $_SESSION['x/o'] = 1;
                    $_SESSION['ia'] = null;
                }elseif ($r == 2){
                    $_SESSION['x/o'] = null;
                    $_SESSION['ia'] = 1;
                }
            }elseif ($_SESSION['p'] == 2){
                $_SESSION['x/o'] = rand(1, 2);
            }
        }elseif ($qi == 1){
            $_SESSION['x/o'] = 1;

        }elseif ($qi == 2){
            if ($_SESSION['p'] == 1) {
                $_SESSION['ia'] = 1;
            }elseif ($_SESSION['p'] == 2){
                $_SESSION['x/o'] = 2;
            }
        }
    }
}