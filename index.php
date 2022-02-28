<?php session_start() ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <title>Jogo da velha</title>
</head>

<body class="conteudo-body">
<div class="conteudo">
    <h1>
        <span class="x"><b>--X</b></span>
            <span class="o"><b>O </b></span>
                Jogo da velha
            <span class="o"><b> O</b></span>
        <span class="x"><b>X--</b></span>
    </h1>
    <form class="center" method="post" action="main.php">
        <fieldset class="inicio">
            <legend>Como irá jogar?</legend>
            <input type="radio" name="player" id="1" value="1" checked><label for="1">Sozinho</label>
            <input type="radio" name="player" id="2" value="2"><label for="2">Acompanhado</label><br>
        </fieldset><br>

        <fieldset class="inicio">
            <legend>Dificuldade modo solitário:</legend>
            <input type="radio" name="dificuldade" id="3" value="1"><label for="3" title="Para crianças.">Extra-fácil</label>
            <input type="radio" name="dificuldade" id="4" value="2"><label for="4" title="Para quem tem cérebro pequeno.">Fácil</label>
            <input type="radio" name="dificuldade" id="5" value="3" checked><label for="5" title="Para quem sabe pensar.">Média</label>
        </fieldset><br>

        <fieldset class="inicio">
            <legend>Quem começa?</legend>
            <input type="radio" name="quem_joga" id="6" value="1"><label for="6">X</label>
            <input type="radio" name="quem_joga" id="7" value="2"><label for="7">O</label>
            <input type="radio" name="quem_joga" id="8" value="3" checked><label for="8">Tanto faz!!!</label>
        </fieldset>

        <span class="x"><b>--X</b></span>
            <span class="o"><b>O</b></span>
                <input class="btn_start" type="submit" value="Bora Jogar!">
            <span class="o"><b>O</b></span>
        <span class="x"><b>X--</b></span>
    </form>
</div>
</body>
</html>