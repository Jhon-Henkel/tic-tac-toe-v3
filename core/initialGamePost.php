<?php

namespace initialGamePost;

use core\classes\DataBase;

$db = new DataBase();

$initialGamePost = json_decode(file_get_contents('php://input'), true);

$db->insert(
    'INSERT INTO 
                player (
                    id_player, 
                    X_O, 
                    difficulty, 
                    qtd_players
                    ) 
                VALUES (    
                    1, 
                    "' . $initialGamePost['init'] . '", 
                    "' . $initialGamePost['difficulty'] . '",
                    "' . $initialGamePost['player'] . '"
                    )'
);

$db->insert ('INSERT INTO board (id_board, J1, J2, J3, J4, J5, J6, J7, J8, J9, got_old, board_done)
                VALUES (1, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, true)');
$db->insert ('INSERT INTO board (id_board, J1, J2, J3, J4, J5, J6, J7, J8, J9)
                VALUES (2, null, null, null, null, null, null, null, null, null)');