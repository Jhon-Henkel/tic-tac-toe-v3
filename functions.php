<?php
function tabuleiro (): void {
    echo '<div class="background_grade"><hr class="linha_horizontal">';
        $k = 0;
        for ($i = 0; $i <= 2; $i++) {
            for ($j = 0; $j <= 2; $j++) {
                $k++;
                echo '<form class="btn" method="post" action="main.php">
                          <input type="hidden" name="'.$_SESSION['form'].'" value="' . $k . '">
                          <button class="btn" type="submit">' .$_SESSION['j'][$i][$j].'</button>
                      </form>
                ';
            }
        }
    echo '</div>';
}//função para exibir o tabuleiro com as posições.

function fim_jogo (): void {
    if (ja_ganho('<span class="x">X</span>')) {
        echo "<h2 class='center'>Parabéns jogador de '<span class='x'>X</span>'</br>" . "Você ganhou!!!</h2>";

    } elseif (ja_ganho('<span class="o">O</span>')) {
        echo "<h2 class='center'>Parabéns jogador de '<span class='o'>O</span>'</br>" . "Você ganhou!!!</h2>";

    }elseif ($_SESSION['deu_velha'] == 9) {
        $_SESSION['x/o'] = false;
        $_SESSION['ia'] = false;
        echo "<h2 class='center'>Deu Velha</br>" . "<span class='vermelho'>Ninguém ganhou!!!</span></h2>";
    }
}//faz a validação de fim de partida.

function ja_ganho($v): bool {
    if (($_SESSION['j'][0][1] == $v && $_SESSION['j'][0][0] == $v && $_SESSION['j'][0][2] == $v)
        || ($_SESSION['j'][1][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][1][2] == $v)
        || ($_SESSION['j'][2][0] == $v && $_SESSION['j'][2][1] == $v && $_SESSION['j'][2][2] == $v)
        || ($_SESSION['j'][0][0] == $v && $_SESSION['j'][1][0] == $v && $_SESSION['j'][2][0] == $v)
        || ($_SESSION['j'][0][1] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][2][1] == $v)
        || ($_SESSION['j'][0][2] == $v && $_SESSION['j'][1][2] == $v && $_SESSION['j'][2][2] == $v)
        || ($_SESSION['j'][0][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][2][2] == $v)
        || ($_SESSION['j'][2][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][0][2] == $v)) {
        $v = true;
        $_SESSION['x/o'] = false;
        $_SESSION['ia'] = false;
    }else{
        $v = false;
    }
    return($v);
}//valida se alguem já ganhou.

function quem_inicia (): void {
    if ($_POST['quem_joga'] == 3){
        if ($_SESSION['player'] == 1) {
            $r = rand(1, 2);
            if ($r == 1){
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = null;
            }elseif ($r == 2){
                $_SESSION['x/o'] = null;
                $_SESSION['ia'] = 1;
            }
        }elseif ($_SESSION['player'] == 2){
            $_SESSION['x/o'] = rand(1, 2);
        }
    }elseif ($_POST['quem_joga'] == 1){
        $_SESSION['x/o'] = 1;
    }elseif ($_POST['quem_joga'] == 2){
        if ($_SESSION['player'] == 1) {
            $_SESSION['ia'] = 1;
        }elseif ($_SESSION['player'] == 2){
            $_SESSION['x/o'] = 2;
        }
    }
}//define quem inicia o jogo.

function jogada_invalida ($x, $o): void {
    $xo = 1;
    for ($jc = 0; $jc <=2; $jc++){
        for ($jl = 0; $jl <=2; $jl++){
            if ($x == $xo && $_SESSION['j'][$jc][$jl] == '<span class="x">X</span>' ||
                $x == $xo && $_SESSION['j'][$jc][$jl] == '<span class="o">O</span>' ||
                $o == $xo && $_SESSION['j'][$jc][$jl] == '<span class="x">X</span>' ||
                $o == $xo && $_SESSION['j'][$jc][$jl] == '<span class="o">O</span>' ){
                echo '<script type="text/javascript">alert("Jogada inválida, o lugar que você escolheu está ocupada!!!");</script>';
                $_SESSION['ia'] = false;
            }
            $xo++;
        }
    }
}//javascript de jogada inválida.

function jogadas_x_o (): void {
    $_SESSION['form'] = $_SESSION['form'] ?? null;

    if ($_SESSION['x/o'] == 1 ){
        $_SESSION['form'] = 'X';
    }elseif ($_SESSION['x/o'] == 2){
        $_SESSION['form'] = 'O';
    }else{
        $_SESSION['form'] = null;
    }

    if ($_SESSION['form'] == 'X' || $_SESSION['form'] == 'O') {
        echo "Clique no local para '<b><span class='" . strtolower($_SESSION['form']) . "'>".$_SESSION['form']."</span></b>':</br>";
    }
}//solicita as jogadas de 'X' e 'O'.

function jogada_ia (): void {
    if (ja_ganho('<span class="x">X</span>')) {
        $_SESSION['ia'] = false;
    }

    if ($_SESSION['dif'] == 1) {
        while ($_SESSION['ia'] == 1) {
            ataque_o();
            $r = rand(1, 9);
            for ($jxo=1; $jxo<=9; $jxo++) {
                for ($jc = 0; $jc <= 2; $jc++) {
                    for ($jl = 0; $jl <= 2; $jl++) {
                        if ($r == $jxo && $_SESSION['j'][$jc][$jl] == $jxo) {
                            $_SESSION['j'][$jc][$jl] = '<span class="o">O</span>';
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
        bloqueia_x();
        if ($_SESSION['ia'] == 1) {
            $r = rand(1, 2);
            if ($r == 1 && $_SESSION['j'][2][2] == 9) {
                $_SESSION['j'][2][2] = '<span class="o">O</span>';
                padrao_o();
            } elseif ($r == 2 && $_SESSION['j'][2][0] == 7) {
                $_SESSION['j'][2][0] = '<span class="o">O</span>';
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
                            $_SESSION['j'][$jc][$jl] = '<span class="o">O</span>';
                            padrao_o();
                            break;
                        }
                    }
                }
            }
        }
    }//final da dificuldade 2.

    if ($_SESSION['dif'] == 3 && $_SESSION['ia']) {
        ataque_o();
        bloqueia_x();
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
                        $_SESSION['j'][$jc][$jl] = '<span class="o">O</span>';
                        padrao_o();
                        break;
                    }
                }
            }
        }
    }//final da dificuldade 3.
}//jogadas de 'O'.

function bloqueia_x (): void {
    if ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 ||
        $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    }elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][9][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    }
} //bloqueio de jogadas X.

function ataque_o (): void {
    if ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][9][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        padrao_o();
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        padrao_o();
    }
}//cria ataques contra X.

function padrao_o (): void {
    $_SESSION['deu_velha']++;
    $_SESSION['x/o'] = 1;
    $_SESSION['ia'] = false;
}//código padrão de todas as jogadas de O, que soma o deu velha, coloca ia como false e o/x como 1.

function reset_game (): void {
    echo '
        <form class="reset" method="post" action="Reset.php">
            <label>
                <input class= "btn_reset" type="submit" value="Reset!">
            </label>
        </form>
    ';
}//formulario de reset que encaminha para reset.php e zera a sessão.