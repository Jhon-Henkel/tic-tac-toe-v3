<?php

include '../banco/DataBase.php';

$dbConnect = new connectDB();

$gamePost = json_decode(file_get_contents('php://input'), true);
$db = $dbConnect->getDb();
$db->query(
    'INSERT INTO 
                player (
                    id_player, 
                    X_O, 
                    difficulty, 
                    qtd_players
                    ) 
                VALUES (    
                    1, 
                    "' . $gamePost['init'] . '", 
                    "' . $gamePost['difficulty'] . '",
                    "' . $gamePost['player'] . '"
                    )'
);