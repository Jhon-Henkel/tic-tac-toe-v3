<?php

function padrao_o ($J): void
{

    require '././banco/DbGame.php';

    $b1 = $banco->query ("SELECT deu_velha FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
    $b2 = $banco->query ("SELECT IA FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
    $reg1 = $b1->fetch_object();
    $reg2 = $b2->fetch_object();

    $q1 = "UPDATE db_jogo_da_velha.jogador SET X_O = 1, IA = null WHERE id_jogador = 1";
    $q2 = "UPDATE db_jogo_da_velha.tabuleiro SET $J = 'O' WHERE id_tab = 1";
    $q3 = "UPDATE db_jogo_da_velha.tabuleiro SET $J = 'O' WHERE id_tab = 2";

    if (is_null($reg1->deu_velha))
    {
        $q4 = "UPDATE db_jogo_da_velha.tabuleiro SET deu_velha = 1 WHERE id_tab = 1";
    }else
    {
        $q4 = "UPDATE db_jogo_da_velha.tabuleiro SET deu_velha = deu_velha +1 WHERE id_tab = 1";
    }

    if ($reg2->IA == 1)
    {
        $banco->query($q1);
        $banco->query($q2);
        $banco->query($q3);
        $banco->query($q4);
    }

}//código padrão de todas as jogadas de O, que soma o deu velha, coloca ia como false e o/x como 1.
