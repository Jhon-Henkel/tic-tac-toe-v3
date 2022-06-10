<?php

namespace endGame;

include_once __DIR__ . '/../config/Constants.php';
include_once __DIR__ . '/../src/banco/DataBase.php';

use banco;
use constants;

class EndGame
{

    private string $endGame; //faz a validação de fim de partida.
    private bool $haveWin; //valida se alguem já ganhou.

    public function getEndGame():string
    {
        return $this->endGame;
    }

    public function setEndGame():void
    {
        $gotOld = banco\connectDB::getDb()->query ("SELECT got_old FROM board WHERE id_board = 1");
        $resultsGotOld = $gotOld->fetch_object();

        $endGame = new EndGame();
        $gameOver = "<h1 class='center vermelho'>Game Over <br></h1>";
        $congratulations = "<h2 class='center'>Parabéns jogador de ";
        $youWin = "<br> Você ganhou!!!</h2>";

        if ($endGame->setHaveWin(constants\Constants::STRING_X)) {
            $this->endGame = $gameOver.$congratulations.'<span class="x">X</span>'.$youWin;
            echo $this->endGame;
        } elseif ($endGame->setHaveWin(constants\Constants::STRING_O)) {
            $this->endGame = $gameOver.$congratulations.'<span class="o">O</span>'.$youWin;
            echo $this->endGame;
        }elseif ($resultsGotOld->got_old == constants\Constants::VALOR_DEU_VELHA)
        {
            $setEndGameGotOld = "UPDATE player SET X_O = false, IA = false WHERE id_player = 1";
            banco\connectDB::getDb()->query ($setEndGameGotOld);
            $this->endGame = $gameOver."<h2 class='center'>Deu Velha</br><span class='vermelho'>Ninguém ganhou!!!</span></h2>";
            echo $this->endGame;
        }
    }

    public function getHaveWin():bool
    {
        return $this->haveWin;
    }

    public function setHaveWin($play):bool
    {
        $selectBoardId1 = banco\connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $endGame = "UPDATE player SET X_O = false, IA = false WHERE id_player = 1";
        $resultsBoardId1 = $selectBoardId1->fetch_object();

        if (
            ($resultsBoardId1->J1 == $play && $resultsBoardId1->J2 == $play && $resultsBoardId1->J3 == $play)
            || ($resultsBoardId1->J4 == $play && $resultsBoardId1->J5 == $play && $resultsBoardId1->J6 == $play)
            || ($resultsBoardId1->J7 == $play && $resultsBoardId1->J8 == $play && $resultsBoardId1->J9 == $play)
            || ($resultsBoardId1->J1 == $play && $resultsBoardId1->J4 == $play && $resultsBoardId1->J7 == $play)
            || ($resultsBoardId1->J2 == $play && $resultsBoardId1->J5 == $play && $resultsBoardId1->J8 == $play)
            || ($resultsBoardId1->J3 == $play && $resultsBoardId1->J6 == $play && $resultsBoardId1->J9 == $play)
            || ($resultsBoardId1->J1 == $play && $resultsBoardId1->J5 == $play && $resultsBoardId1->J9 == $play)
            || ($resultsBoardId1->J3 == $play && $resultsBoardId1->J5 == $play && $resultsBoardId1->J7 == $play)
        ) {
            $this->haveWin = true;
            banco\connectDB::getDb()->query ($endGame);
        } else {
            $this->haveWin = false;
        }
        return($this->haveWin);
    }
}