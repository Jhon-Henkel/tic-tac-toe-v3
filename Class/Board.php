<?php
//cria o tabuleiro e faz a solicitação de jogadas.
class Board
{

    public function __construct($whoStart, $player)
    {
        $this->whoStart($whoStart, $player);
    }//Cria o Array do tabuleiro.

    public function board (): void
    {
        require '../src/banco/DataBase.php';

        $selectBoardId1 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $selectPlayerId1 = connectDB::getDb()->query ("SELECT X_O, IA FROM player WHERE id_player = 1");
        $selectBoardId2 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 2");
        $resultsBoardId1 = $selectBoardId1->fetch_object();
        $resultsBoardId2 = $selectBoardId2->fetch_object();
        $whoPlay = $selectPlayerId1->fetch_object();
        $xo = $xo ?? null;

        // form 1 = X.
        // form 0 = O.

        if ($whoPlay->X_O == 1 ) {
            $updateFormPlayer = "UPDATE board SET form = 1 WHERE id_board = 1";
            connectDB::getDb()->query ($updateFormPlayer);
            $xo = 'X';
        } elseif ($whoPlay->X_O == 2) {
            $updateFormPlayer = "UPDATE board SET form = 0 WHERE id_board = 1";
            connectDB::getDb()->query ($updateFormPlayer);
            $xo = 'O';
        }

        if ($whoPlay->X_O) {
            ?>
                Clique no local para <b><span class='<?php echo strtolower($xo) ?>'> <?php echo $xo ?> </span></b>':</br>
            <?php
        }

        ?>
            <div class="background_grade"><hr class="linha_horizontal">
        <?php

        for ($j = 1; $j <= 9; $j++) {
            $boardField = 'J'.$j;
            if ($resultsBoardId2->$boardField == 'X') {
                $field = '<span class="x">'.$resultsBoardId1->$boardField.'</span>';
            }elseif ($resultsBoardId2->$boardField == 'O') {
                $field = '<span class="o">'.$resultsBoardId1->$boardField.'</span>';
            }else {
                $field = $resultsBoardId2->$boardField;
            }

            ?>
            <form class="btn" method="post" action="../view/lets-play.php">
                <input type="hidden" name="<?php echo $xo ?>" value="<?php echo $j ?>">
                <button class="btn" type="submit"> <?php echo $field ?></button>
            </form>
            <?php
            }
        ?>
            </div>
        <?php //função para exibir o tabuleiro com as posições.*/
    }

    public function whoStart($whoStart, $player): void
    {
        require '../src/banco/DataBase.php';

        //$whoStart = quem inicia | 1 = X | 2 = O | 3 = Tanto faz
        //$player = quantidade de jogadores | 1 = single player | 2 = multiplayer

        if ($whoStart == 3) {
            if ($player == 1) {
                $random = rand(1, 2);
                if ($random == 1) {
                    $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
                } elseif ($random == 2) {
                    $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
                }
            } elseif ($player == 2) {
                $random = rand (1, 2);
                $updateWhoStart = "UPDATE player SET X_O = '$random' WHERE id_player = 1";
            }
        } elseif ($whoStart == 1) {
            $updateWhoStart = "UPDATE player SET X_O = '1', IA = null WHERE id_player = 1";
        } elseif ($whoStart == 2) {
            if ($player == 1) {
                $updateWhoStart = "UPDATE player SET IA = '1', X_O = null WHERE id_player = 1";
            } elseif ($player == 2) {
                $updateWhoStart = "UPDATE player SET X_O = '2' WHERE id_player = 1";
            }
        }
        $updateWhoStart = $updateWhoStart ?? null;
        connectDB::getDb()->query ($updateWhoStart);
    }
}