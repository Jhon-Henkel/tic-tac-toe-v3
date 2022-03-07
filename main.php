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
        require_once 'Class/Reset.php';
        require_once 'Class/Qtd_player.php';
        require_once 'Class/Fim_jogo.php';
        require_once 'Class/Quem_inicia.php';
        require_once 'Class/Jogada_invalida.php';
        require_once 'Class/Dificuldade.php';
        require_once 'Class/Tabuleiro.php';
        require_once 'Class/IA/Jogadas_IA.php';
        require_once 'Class/Player/Jogada_User.php';

        $_SESSION['X_fixo'] = '<span class="x">X</span>'; //deixa X formatado com cor.
        $_SESSION['O_fixo'] = '<span class="o">O</span>'; //deixa O formatado com cor.

        $pl = new Qtd_player($_POST['p'] ?? null);    //Define a quantidade de jogadores.
        $qi = new Quem_inicia($_POST['qi'] ?? null);     //Define quem inicia.
        $df = new Dificuldade($_POST['df'] ?? null);    //Define a dificuldade.
        $re = new Reset();                                  //Chama classe de reset do game.
        $fj = new Fim_jogo();                               //Valida o fim de jogo.
        $tb = new Tabuleiro();                              //Constroi o tabuleiro.
        $ia = new Jogadas_IA();                             //Jogadas IA no modo One player.
        $ju = new Jogada_User();                            //Jogadas do usuário.
        $ji = new Jogada_invalida();                        //Valida as jogadas.

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($_SESSION ['p'] == 1){
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
            $o = null;

            echo "<b>Dificuldade da IA: </b>"."<span class='vermelho'>".$_SESSION['dificuldade']."</span></br></br>";
            $ji->jogadaInvalida($x, $o);
            $ju->play($x);
            $ia->jogada_ia();
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////TWO PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($_SESSION ['p'] == 2){
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
            $o = $_POST['O'] ?? null; //pega o valor escolhido por 'O' no formulário.

            $ji->jogadaInvalida($x, $o);
            $ju->play($x);
            $ju->play($o);
        }

        $fj->setFimJogo();
        $tb->tab();
        $re->reset_game();
    ?>
</div>
</body>
</html>