<?php
require_once 'Padrao.php';
class Ataque{
    function ataque_o (): void {
        require '././banco/banco.php';

        $b1 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $b2 = $banco->query ("SELECT IA FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");
        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();

        if ($reg2->IA == 1) {
            if ($reg1->J00 == 'O' && $reg1->J01 == 'O' && $reg1->J02 == 3) {
                padrao_o('J02');
            } elseif
            ($reg1->J01 == 'O' && $reg1->J02 == 'O' && $reg1->J00 == 1) {
                padrao_o('J00');
            } elseif
            ($reg1->J00 == 'O' && $reg1->J02 == 'O' && $reg1->J01 == 2) {
                padrao_o('J01');
            } elseif
            ($reg1->J10 == 'O' && $reg1->J11 == 'O' && $reg1->J12 == 6) {
                padrao_o('J12');
            } elseif
            ($reg1->J11 == 'O' && $reg1->J12 == 'O' && $reg1->J10 == 4) {
                padrao_o('J10');
            } elseif
            ($reg1->J10 == 'O' && $reg1->J12 == 'O' && $reg1->J11 == 5) {
                padrao_o('J11');
            } elseif
            ($reg1->J20 == 'O' && $reg1->J21 == 'O' && $reg1->J22 == 9) {
                padrao_o('J22');
            } elseif
            ($reg1->J21 == 'O' && $reg1->J22 == 'O' && $reg1->J20 == 7) {
                padrao_o('J20');
            } elseif
            ($reg1->J20 == 'O' && $reg1->J22 == 'O' && $reg1->J21 == 8) {
                padrao_o('J21');
            } elseif
            ($reg1->J00 == 'O' && $reg1->J10 == 'O' && $reg1->J20 == 7) {
                padrao_o('J20');
            } elseif
            ($reg1->J10 == 'O' && $reg1->J20 == 'O' && $reg1->J00 == 1) {
                padrao_o('J00');
            } elseif
            ($reg1->J00 == 'O' && $reg1->J20 == 'O' && $reg1->J10 == 4) {
                padrao_o('J10');
            } elseif
            ($reg1->J01 == 'O' && $reg1->J11 == 'O' && $reg1->J21 == 8) {
                padrao_o('J21');
            } elseif
            ($reg1->J11 == 'O' && $reg1->J21 == 'O' && $reg1->J01 == 2) {
                padrao_o('J01');
            } elseif
            ($reg1->J01 == 'O' && $reg1->J21 == 'O' && $reg1->J11 == 5) {
                padrao_o('J11');
            } elseif
            ($reg1->J02 == 'O' && $reg1->J12 == 'O' && $reg1->J22 == 9) {
                padrao_o('J22');
            } elseif
            ($reg1->J12 == 'O' && $reg1->J22 == 'O' && $reg1->J02 == 3) {
                padrao_o('J02');
            } elseif
            ($reg1->J02 == 'O' && $reg1->J22 == 'O' && $reg1->J12 == 6) {
                padrao_o('J12');
            } elseif
            ($reg1->J00 == 'O' && $reg1->J11 == 'O' && $reg1->J22 == 9) {
                padrao_o('J22');
            } elseif
            ($reg1->J11 == 'O' && $reg1->J22 == 'O' && $reg1->J00 == 1) {
                padrao_o('J00');
            } elseif
            ($reg1->J00 == 'O' && $reg1->J22 == 'O' && $reg1->J11 == 5) {
                padrao_o('J11');
            } elseif
            ($reg1->J20 == 'O' && $reg1->J11 == 'O' && $reg1->J02 == 3) {
                padrao_o('J02');
            } elseif
            ($reg1->J11 == 'O' && $reg1->J02 == 'O' && $reg1->J20 == 7) {
                padrao_o('J20');
            } elseif
            ($reg1->J20 == 'O' && $reg1->J02 == 'O' && $reg1->J11 == 5) {
                padrao_o('J11');
            }
        }
    }//cria ataques contra X.
}