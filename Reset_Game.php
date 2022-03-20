<?php
    require 'banco/banco.php';
    session_start();
    session_destroy();

    $q1 = "TRUNCATE TABLE db_jogo_da_velha.jogador";
    $q2 = "TRUNCATE TABLE db_jogo_da_velha.tabuleiro";

    $banco->query ($q1);
    $banco->query ($q2);
    $banco->close();

    header('location: index.php');