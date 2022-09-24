<?php
namespace core\class;

use core\DataBase;
use Exception;

class PrepareGameStart
{
    /**
     * @throws Exception
     */
    public function truncateTables(): void
    {
        try {
            $db = new DataBase();
            $db->truncate('TRUNCATE TABLE player');
            $db->truncate('TRUNCATE TABLE board');
        } catch (Exception) {
            throw new Exception('Não foi possível fazer o truncate!', 500);
        }
    }

    /**
     * @throws Exception
     */
    public function prepareGameTables(array $initialGamePost): void
    {
        $db = new DataBase();
        $this->truncateTables();

        $db->insert(
        'INSERT INTO player (
                id_player,
                X_O,
                difficulty,
                qtd_players
            ) VALUES (
                1, 
                "' . $initialGamePost['init'] . '",
                "' . $initialGamePost['difficulty'] . '",
                "' . $initialGamePost['player'] . '"
            )'
        );

        $db->insert('INSERT INTO board (id_board, J1, J2, J3, J4, J5, J6, J7, J8, J9) VALUES (1, 1, 2, 3, 4, 5, 6, 7, 8, 9)');
        $db->insert('INSERT INTO board (id_board, J1, J2, J3, J4, J5, J6, J7, J8, J9) VALUES (2, null, null, null, null, null, null, null, null, null)');

    }

    /**
     * @throws Exception
     */
    public function validatePostParams(array $initialGamePost): bool
    {
        if (
            !isset($initialGamePost['init'])
            || !isset($initialGamePost['difficulty'])
            || !isset($initialGamePost['player'])
        ) {
            throw new Exception('Parâmetros obrigatórios não informados (init, difficulty, player)', 403);
        }

        if ($initialGamePost['init'] > 3 || $initialGamePost['difficulty'] > 3 || $initialGamePost['player'] > 2) {
            throw new Exception('Parâmetros com valores inválidos', 404);
        }

        return true;
    }
}