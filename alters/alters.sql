-- criar base de dados --
CREATE DATABASE IF NOT EXISTS tic_tac_toe;
USE tic_tac_toe;

-- criar tabela players --
CREATE TABLE IF NOT EXISTS player (
    id_player int NOT NULL AUTO_INCREMENT,
    X_O varchar(6) DEFAULT NULL,
    IA varchar(6) DEFAULT NULL,
    difficulty varchar(30) DEFAULT NULL,
    qtd_players varchar(3) DEFAULT NULL,
    PRIMARY KEY (`id_player`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar tabela tabuleiro --
CREATE TABLE IF NOT EXISTS board (
    id_board int NOT NULL AUTO_INCREMENT,
    J1 varchar(30) DEFAULT '1',
    J2 varchar(30) DEFAULT '2',
    J3 varchar(30) DEFAULT '3',
    J4 varchar(30) DEFAULT '4',
    J5 varchar(30) DEFAULT '5',
    J6 varchar(30) DEFAULT '6',
    J7 varchar(30) DEFAULT '7',
    J8 varchar(30) DEFAULT '8',
    J9 varchar(30) DEFAULT '9',
    got_old varchar(6) DEFAULT NULL,
    board_done varchar(6) DEFAULT NULL,
    form varchar(5) DEFAULT NULL,
    PRIMARY KEY (`id_board`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;