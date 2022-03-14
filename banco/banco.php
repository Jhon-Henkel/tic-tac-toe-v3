 <?php
 $banco = new mysqli('127.0.0.1','root','Climba2305@','db_jogo_da_velha');
 if ($banco->connect_error){
     echo 'Erro ao conectar banco de dados!!!';
     die();
 }

 $banco->query('set names "utf8"');
 $banco->query('set character_set_connection=utf8');
 $banco->query('set character_set_client=utf8');
 $banco->query('set character_set_results=utf8');