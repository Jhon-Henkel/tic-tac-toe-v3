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
    <?php
        $_SESSION['botaoResetPlacar'] = false;
        include    'placar.php';
    ?>
<div class="conteudo">
    <?php
        include 'banco/DbGame.php';
        require_once 'Class/Tabuleiro.php';
        require_once 'Class/Jogada_invalida.php';
        require_once 'Class/Player/Jogada_User.php';
        require_once 'Class/IA/Jogadas_IA.php';
        require_once 'Class/Fim_jogo.php';
        require_once 'Class/Reset.php';

        $tb = new Tabuleiro($_POST['qi'],                   //Constroi o tabuleiro.
                            $_POST['p'],                    //Define a quantidade de jogadores.
                            $_POST['df'],                   //Define a dificuldade
            );
        $ji = new Jogada_invalida();                        //Valida as jogadas.
        $ju = new Jogada_User();                            //Jogadas do usuário.
        $ia = new Jogadas_IA();                             //Jogadas IA no modo One player.
        $fj = new Fim_jogo();                               //Valida o fim de jogo.
        $re = new Reset();                                  //Chama classe de reset do game.

        $b = $dataBase->query ("SELECT qtd_jog, dific FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $reg = $b->fetch_object();

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($reg->qtd_jog == 1){
            $x = $_POST['X'];
            $o = null;

            echo "<b>Dificuldade da IA: </b>"."<span class='vermelho'>$reg->dific</span></br></br>";
            $ji->jogadaInvalida($x, $o);
            $ju->play($x);
            $ia->jogada_ia();
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////TWO PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($reg->qtd_jog == 2){
            $x = $_POST['X'];
            $o = $_POST['O'];

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