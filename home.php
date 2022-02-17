<?php session_start() ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <title>Jogo da velha</title>
</head>

<body>
<div>
    <h1>Jogo da velha</h1>
    <form class="center" method="post" action="main.php">
        </br>
        <label>
            <input type="radio" name="player" value="1" checked> Single Player
            <input type="radio" name="player" value="2"> Two Player's </br></br>
            <br><b>Dificuldade da IA no single player: </b></br></br>
            <input type="radio" name="dificuldade" value="1" title="Não irei me defender."> Burra
            <input type="radio" name="dificuldade" value="2" title="Irei me defender, mas pegarei leve."> Leve
            <input type="radio" name="dificuldade" value="3" title="Não irei deixar você ganhar!!! " checked> Pesada </br></br>
            <input type="submit" value="Bora Jogar!">
        </label>
    </form>
</div>
</body>
</html>