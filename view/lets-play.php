<?php

namespace letsPlay;

require_once __DIR__ . '/../config/Constants.php';
require_once __DIR__ . '/../src/banco/DataBase.php';
require_once __DIR__ . '/../Class/Board.php';
require_once __DIR__ . '/../Class/InvalidPlay.php';
require_once __DIR__ . '/../Class/Player/UserPlay.php';
require_once __DIR__ . '/../Class/IA/IaPlay.php';
require_once __DIR__ . '/../Class/EndGame.php';
require_once __DIR__ . '/../Class/Reset.php';

use banco\connectDB;
use board\Board;
use invalidPlay\InvalidPlay;
use userPlay\UserPlay;
use iaPlay\IaPlay;
use endGame\EndGame;
use reset\Reset;
use constants\Constants;

$selectModeAndDifficulty = connectDB::getDb()
    ->query ("SELECT X_O, qtd_players, difficulty FROM player WHERE id_player = 1");

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
if ($result->qtd_players == Constants::VALOR_SINGLE_PLAYER){
    $x = $_POST[Constants::STRING_X] ?? null;
    $o = null;

    switch ($result->difficulty) {
        case 1:
            $difficulty = Constants::STRING_FACIL;
            break;
        case 2:
            $difficulty = Constants::STRING_MEDIA;
            break;
        case 3:
            $difficulty = Constants::STRING_DIFICIL;
            break;
    }

    ?>
        <b>Dificuldade da IA: </b><span class='vermelho'> <?php echo $difficulty ?> </span><br><br>
    <?php

    $d = file_get_contents('php://input');
    echo $d;

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
if ($result->qtd_players == Constants::VALOR_MULTI_PLAYER){
    $x = $_POST[Constants::STRING_X] ?? null;
    $o = $_POST[Constants::STRING_O] ?? null;

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