<?php
    require 'banco/DbGame.php';

    $q1 = "TRUNCATE TABLE db_jogo_da_velha.jogador";
    $q2 = "TRUNCATE TABLE db_jogo_da_velha.tabuleiro";

    $dataBase->query ($q1);
    $dataBase->query ($q2);
    $dataBase->close();

    header('location: index.html');