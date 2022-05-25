<?php
    include '../src/banco/DataBase.php';
    require_once '../Class/Board.php';
    require_once '../Class/InvalidPlay.php';
    require_once '../Class/Player/UserPlay.php';
    require_once '../Class/IA/IaPlay.php';
    require_once '../Class/EndGame.php';
    require_once '../Class/Reset.php';

    $selectModeAndDifficulty = connectDB::getDb()->query ("SELECT X_O, qtd_player, difficulty FROM player WHERE id_player = 1");
    $result = $selectModeAndDifficulty->fetch_object();

    $board          =   new Board($_POST[$result->X_O], $_POST[$result->qtd_player]);
    $invalidPlay    =   new InvalidPlay();  //Valida as jogadas.
    $userPlay       =   new UserPlay();     //Jogadas do usuário.
    $iaPlay         =   new IaPlay();       //Jogadas IA no modo One player.
    $endGame        =   new EndGame();      //Valida o fim de jogo.
    $reset          =   new Reset();        //Chama classe de reset do game.


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($result->qtd_player == 1){
        $x = $_POST['X'];
        $o = null;

        ?>
            <b>Dificuldade da IA: </b><span class='vermelho'> <?php $result->difficulty ?> </span><br><br>
        <?php
        $invalidPlay->jogadaInvalida($x, $o);
        $userPlay->play($x);
        $iaPlay->IaPlay();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////TWO PLAYER////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($result->qtd_jog == 2){
        $x = $_POST['X'];
        $o = $_POST['O'];

        $invalidPlay->jogadaInvalida($x, $o);
        $userPlay->play($x);
        $userPlay->play($o);
    }

    $endGame->setEndGame();
    $board->board();
    $reset->resetGame();