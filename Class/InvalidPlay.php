<?php
//javascript de jogada inválida.
class InvalidPlay
{
    function jogadaInvalida ($x, $o): void
    {
        require '../src/banco/DataBase.php';

        $selectBoardId1 = connectDB::getDb()->query ("SELECT * FROM board WHERE id_board = 1");
        $updateIaFalse = "UPDATE player SET IA = false WHERE id_player = 1";
        $resultsSelectBoard = $selectBoardId1->fetch_object();

        for ($j = 1; $j <=9; $j++) {
            $boardField = 'J'.$j;
            if (
                $x == $j && $resultsSelectBoard->$boardField == 'X'
                || $x == $j && $resultsSelectBoard->$boardField == 'O'
                || $o == $j && $resultsSelectBoard->$boardField == 'X'
                || $o == $j && $resultsSelectBoard->$boardField == 'O'
            ) {
                ?>
                <script>
                    alert("Jogada inválida, o lugar que você escolheu está ocupado!!!");
                </script>
                <?php
                connectDB::getDb()->query ($updateIaFalse);
            }
        }
    }
}