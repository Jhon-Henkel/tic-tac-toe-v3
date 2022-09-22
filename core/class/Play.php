<?php

namespace core\class;

use core\DataBase;
use Exception;

class Play
{
    /**
     * @throws Exception
     */
    public function postPositionPlay(array $data): bool
    {
        try {
            $db = new DataBase();

            $position = $data['position'];
            $value = $data['value'];

            $db->update('UPDATE board SET ' . $position . ' = "' . $value . '" WHERE id_board = 1');
            $db->update('UPDATE board SET ' . $position . ' = "' . $value . '" WHERE id_board = 2');

            return true;

        } catch (Exception $exception) {
            throw new Exception('Não foi possível gravar dados da jogada');
        }
    }
}