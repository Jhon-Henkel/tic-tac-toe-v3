<?php
require_once 'Padrao.php';
class Defesa {
    function bloqueia (): void {
        if ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5 ||
            $_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5) {
            $_SESSION['j'][1][1] = $_SESSION['O_fixo'];
            padrao_o();
        }elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][0][1] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == 3) {
            $_SESSION['j'][0][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][1] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][0][0] == 1) {
            $_SESSION['j'][0][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][0][1] == 2) {
            $_SESSION['j'][0][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][1][2] == 6) {
            $_SESSION['j'][1][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][1][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][0] == 4) {
            $_SESSION['j'][1][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5) {
            $_SESSION['j'][1][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == 9) {
            $_SESSION['j'][2][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][2][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][0] == 7) {
            $_SESSION['j'][2][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][1] == 8) {
            $_SESSION['j'][2][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][0] == 7) {
            $_SESSION['j'][2][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][0][0] == 1) {
            $_SESSION['j'][0][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][0] == 4) {
            $_SESSION['j'][1][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][1] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][1] == 8) {
            $_SESSION['j'][2][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][1] == $_SESSION['X_fixo'] && $_SESSION['j'][0][1] == 2) {
            $_SESSION['j'][0][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][1] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5) {
            $_SESSION['j'][1][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == 9) {
            $_SESSION['j'][2][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == 3) {
            $_SESSION['j'][0][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][2] == 6) {
            $_SESSION['j'][1][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == 9) {
            $_SESSION['j'][9][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][0][0] == 1) {
            $_SESSION['j'][0][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][0][0] == $_SESSION['X_fixo'] && $_SESSION['j'][2][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5) {
            $_SESSION['j'][1][1] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == 3) {
            $_SESSION['j'][0][2] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][1][1] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][2][0] == 7) {
            $_SESSION['j'][2][0] = $_SESSION['O_fixo'];
            padrao_o();
        } elseif ($_SESSION['j'][2][0] == $_SESSION['X_fixo'] && $_SESSION['j'][0][2] == $_SESSION['X_fixo'] && $_SESSION['j'][1][1] == 5) {
            $_SESSION['j'][1][1] = $_SESSION['O_fixo'];
            padrao_o();
        }
    } //bloqueio de jogadas X.

}