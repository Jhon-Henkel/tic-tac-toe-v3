 <?php

 $banco = new mysqli('127.0.0.1', 'root', 'Climba2305@', 'db_jogo_da_velha');

 $q1 = "CREATE TABLE IF NOT EXISTS db_jogo_da_velha.jogador (
            id_jogador int NOT NULL AUTO_INCREMENT,
            X_O varchar(6) DEFAULT NULL,
            IA varchar(6) DEFAULT NULL,
            dific varchar(30) DEFAULT NULL,
            qtd_jog varchar(3) DEFAULT NULL,
        PRIMARY KEY (`id_jogador`)) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
 ";
 $q2 = "CREATE TABLE IF NOT EXISTS db_jogo_da_velha.tabuleiro (
            id_tab int NOT NULL AUTO_INCREMENT,
            J00 varchar(30) DEFAULT '1',
            J01 varchar(30) DEFAULT '2',
            J02 varchar(30) DEFAULT '3',
            J10 varchar(30) DEFAULT '4',
            J11 varchar(30) DEFAULT '5',
            J12 varchar(30) DEFAULT '6',
            J20 varchar(30) DEFAULT '7',
            J21 varchar(30) DEFAULT '8',
            J22 varchar(30) DEFAULT '9',
            deu_velha varchar(6) DEFAULT NULL,
            tab_done varchar(6) DEFAULT NULL,
            form varchar(5) DEFAULT NULL,
        PRIMARY KEY (`id_tab`)) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
 ";

 $banco->query ($q1);
 $banco->query ($q2);

 if ($banco->connect_error){
     echo 'Erro ao conectar banco de dados!!! <br><br> Preciso que a database "db_jogo_da_velha" esteja criada. <br><br>';
     echo 'Não se preocupe, eu crio as tabelas ;)';
     echo '<br><br>Caso já esteja criado, basta definir a senha do seu banco na linha 3 
            do arquivo banco.php que se encontra dentro da pasta banco.';
     die();
 }

 $banco->query('set names "utf8"');
 $banco->query('set character_set_connection=utf8');
 $banco->query('set character_set_client=utf8');
 $banco->query('set character_set_results=utf8');