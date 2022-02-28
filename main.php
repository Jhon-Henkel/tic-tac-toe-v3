<?php session_start() ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <link rel="shortcut icon" href="_css/tic-tac-toe.png" type="image/x-icon"/>
    <title>Jogo da velha</title>
</head>

<body class="conteudo-body">
<div class="conteudo">
    <?php
        require_once "functions.php";
        $player = $_POST["player"] ?? null;//lê o valor informado na tela index.php
        if ($player == 1){
            $_SESSION['player'] = 1;
        }elseif($player == 2){
            $_SESSION['player'] = 2;
        }//coloca o valor passado pela tela home em uma variavel global.

        $_SESSION ['tabuleiro'] = $_SESSION ['tabuleiro'] ?? null;
        if ($_SESSION ['tabuleiro'] == null) {
            $_SESSION ['j'] = [array(1, 2, 3), array(4, 5, 6), array(7, 8, 9)];
            $_SESSION ['tabuleiro'] = true;
        }//Cria o Array do tabuleiro e numera as casas.

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($_SESSION ['player'] == 1){
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
            $dificuldade = $_POST['dificuldade'] ?? null; //dificuldade escolhida, padrão é 3 (difícil).
            quem_inicia(); //define quem inicia o jogo.

            if ($dificuldade == 1){
                $_SESSION ['dif'] = 1;
                $_SESSION ['dificuldade'] = "Extra-Fácil.";
            }elseif ($dificuldade == 2) {
                $_SESSION ['dif'] = 2;
                $_SESSION ['dificuldade'] = "Fácil.";
            }elseif ($dificuldade == 3) {
                $_SESSION ['dif'] = 3;
                $_SESSION ['dificuldade'] = "Média";
            } // armazena a dificuldade escolhida em uma variavel global e dá nome.
            echo "<b>Dificuldade da IA: </b>"."<span class='vermelho'>".$_SESSION['dificuldade']."</span></br></br>";

            for ($jxo=1; $jxo<=9; $jxo++) {
                for ($jc = 0; $jc <= 2; $jc++) {
                    for ($jl = 0; $jl <= 2; $jl++) {
                        if ($x == $jxo && $_SESSION['j'][$jc][$jl] == $jxo) {
                            $_SESSION['j'][$jc][$jl] = '<span class="x">X</span>';
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = false;
                            $_SESSION['ia'] = 1;
                            $x = null;
                            $o = null;
                        }
                    }
                }
            }//jogadas de 'X'.
            jogada_invalida($x, null);//faz a validação de jogada.
            jogada_ia ();//faz a jogada de O pela IA.
            fim_jogo ();//valida o fim da partida.
            jogadas_x_o();//informa as jogadas de X e O.
        }//jogadas one player.

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////TWO PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($_SESSION ['player'] == 2){
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
            $o = $_POST['O'] ?? null; //pega o valor escolhido por 'O' no formulário.
            quem_inicia(); //define quem inicia o jogo.

            for ($jxo=1; $jxo<=9; $jxo++){
                for ($jc=0; $jc<=2; $jc++){
                    for ($jl=0; $jl<=2; $jl++){
                        if ($x == $jxo && $_SESSION['j'][$jc][$jl] == $jxo){
                            $_SESSION['j'][$jc][$jl] = '<span class="x">X</span>';
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = 2;
                            $x = null;
                            $o = null;
                        }elseif ($o == $jxo && $_SESSION['j'][$jc][$jl] == $jxo){
                            $_SESSION['j'][$jc][$jl] = '<span class="o">O</span>';
                            $_SESSION['deu_velha']++;
                            $_SESSION['x/o'] = 1;
                            $x = null;
                            $o = null;
                        }
                    }
                }
            }//jogadas de 'X' e 'O'.
            jogada_invalida($x, $o);//faz a validação de jogada.
            fim_jogo ();//valida o fim da partida.
            jogadas_x_o();//informa as jogadas de X e O.
        }//jogadas two players
        tabuleiro ();//mostra o tabuleiro.
        reset_game();
    ?>
</div>
</body>
</html>