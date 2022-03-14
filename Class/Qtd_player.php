<?php
require_once '../banco/banco.php';
//coloca o valor passado pela tela home em uma variavel global.
class Qtd_player {

    public function __construct($player){
        if ($player == 1 || $player == 2) {
            $banco = $banco ?? null;
            $q = "INSERT INTO db_jogo_da_velha.jogador (id_jogador, qtd_jog) VALUES ('1', '$player')";
            $banco->query($q);
            if ($banco->query($q)) {
                echo '<script type="javascript">alert("Deu certo")';
            }else{
                echo '<script type="javascript">alert("Deu errado")';
            }
        }
    }
}

