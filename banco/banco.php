 <?php
 $host = '127.0.0.1';
 $user = 'root';
 $pass = 'Climba2305@';
 $data = 'db_jogo_da_velha';

 $banco = new mysqli($host, $user, $pass, $data);

 if ($banco->connect_error){
     echo 'Erro ao conectar banco de dados!!!';
     die();
 }

 $banco->query('set names "utf8"');
 $banco->query('set character_set_connection=utf8');
 $banco->query('set character_set_client=utf8');
 $banco->query('set character_set_results=utf8');