<?php

namespace letsPlay;

use core\classes\DataBase;
use board\Board;
use invalidPlay\InvalidPlay;
use userPlay\UserPlay;
use iaPlay\IaPlay;
use endGame\EndGame;
use reset\Reset;

$db = new DataBase();
$selectModeAndDifficulty = $db->select ("SELECT X_O, qtd_players, difficulty FROM player WHERE id_player = 1");

$result = $selectModeAndDifficulty->fetch_object();

$board          =   new Board($result->X_O, $result->qtd_players);
$invalidPlay    =   new InvalidPlay();
$userPlay       =   new UserPlay();
$iaPlay         =   new IaPlay();
$endGame        =   new EndGame();
$reset          =   new Reset();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////ONE PLAYER////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($result->qtd_players == VALOR_SINGLE_PLAYER){
    $x = $_POST[STRING_X] ?? null;
    $o = null;

    switch ($result->difficulty) {
        case 1:
            $difficulty = STRING_FACIL;
            break;
        case 2:
            $difficulty = STRING_MEDIA;
            break;
        case 3:
            $difficulty = STRING_DIFICIL;
            break;
    }

    ?>
        <b>Dificuldade da IA: </b><span class='vermelho'> <?php echo $difficulty ?> </span><br><br>
    <?php

    $invalidPlay->jogadaInvalida($x, $o);

    if (!is_null($x)) {
        $userPlay->play($x);
    } else {
        $iaPlay->IaPlay();
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////TWO PLAYER////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($result->qtd_players == VALOR_MULTI_PLAYER){
    $x = $_POST[STRING_X] ?? null;
    $o = $_POST[STRING_O] ?? null;

    $invalidPlay->jogadaInvalida($x, $o);

    if (!is_null($x)) {
        $userPlay->play($x);
    } else {
        $userPlay->play($o);
    }
}

$endGame->setEndGame();
$board->board();
$reset->resetGame();