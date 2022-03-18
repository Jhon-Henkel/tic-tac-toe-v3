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
        include      'banco/banco.php';                 //Não precisa de db.
        require_once 'Class/Qtd_player.php';            //db_ok.
        require_once 'Class/Dificuldade.php';           //db_ok.
        require_once 'Class/Quem_inicia.php';           //db_ok.
        require_once 'Class/Tabuleiro.php';             //db_ok.
        require_once 'Class/Jogada_invalida.php';       //Conferir se vai funcionar.
        require_once 'Class/Player/Jogada_User.php';    //Conferir se vai funcionar.
        require_once 'Class/IA/Jogadas_IA.php';
        require_once 'Class/Fim_jogo.php';
        require_once 'Class/Reset.php';                 //db_ok.

        $_SESSION['X_fixo'] = '<span class="x">X</span>'; //deixa X formatado com cor.
        $_SESSION['O_fixo'] = '<span class="o">O</span>'; //deixa O formatado com cor.

        $b = $banco->query ("SELECT * FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $reg = $b->fetch_object();

        $pl = new Qtd_player($_POST['p']);                  //Define a quantidade de jogadores.
        $df = new Dificuldade($_POST['df']);                //Define a dificuldade.
        $qi = new Quem_inicia($_POST['qi'], $_POST['p']);   //Define quem inicia.
        $tb = new Tabuleiro();                              //Constroi o tabuleiro.
        $ji = new Jogada_invalida();                        //Valida as jogadas.
        $ju = new Jogada_User();                            //Jogadas do usuário.
        $ia = new Jogadas_IA();                             //Jogadas IA no modo One player.
        $fj = new Fim_jogo();                               //Valida o fim de jogo.
        $re = new Reset();                                  //Chama classe de reset do game.

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($reg->qtd_jog == 1){
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
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
            $x = $_POST['X'] ?? null; //pega o valor escolhido por 'X' no formulário.
            $o = $_POST['O'] ?? null; //pega o valor escolhido por 'O' no formulário.

            /*$ji->jogadaInvalida($x, $o);*/
            $ju->play($x);
            $ju->play($o);
        }


        /*$fj->setFimJogo();*/
        $tb->tab();
        $re->reset_game();
        /*$banco->close();*/
    ?>
</div>
</body>
</html>