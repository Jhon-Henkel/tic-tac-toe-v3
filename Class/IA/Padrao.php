<?php

function padrao_o (): void {
    $_SESSION['deu_velha']++;
    $_SESSION['x/o'] = 1;
    $_SESSION['ia'] = false;
}//código padrão de todas as jogadas de O, que soma o deu velha, coloca ia como false e o/x como 1.
