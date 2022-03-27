<?php session_start() ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <link rel="shortcut icon" href="_css/tic-tac-toe.png" type="image/x-icon"/>
    <title>Jogo da velha</title>
</head>

<body class="conteudo-body">
    <?php
        $_SESSION['botaoResetPlacar'] = true;
        $_SESSION['X'] = $_SESSION['X'] ?? 0;
        $_SESSION['O'] = $_SESSION['O'] ?? 0;
        include 'placar.php';
    ?>
<div class="conteudo">
    <h1>
        <span class="x"><b>--X</b></span>
            <span class="o"><b>O </b></span>
                Jogo da velha
            <span class="o"><b> O</b></span>
        <span class="x"><b>X--</b></span>
    </h1>
    <form class="center" method="post" action="./main.php">
        <fieldset class="inicio">
            <legend>Como irá jogar?</legend>
            <input type="radio" name="p" id="1" value="1" checked><label for="1">Sozinho</label>
            <input type="radio" name="p" id="2" value="2"><label for="2">Acompanhado</label><br>
        </fieldset><br>

        <fieldset class="inicio">
            <legend>Dificuldade modo solitário:</legend>
            <input type="radio" name="df" id="3" value="1"><label for="3" title="Para crianças.">Extra-fácil</label>
            <input type="radio" name="df" id="4" value="2"><label for="4" title="Para pessoas desprovidas de inteligencia.">Fácil</label>
            <input type="radio" name="df" id="5" value="3"  checked><label for="5" title="Para pessoas normais.">Média</label>
        </fieldset><br>

        <fieldset class="inicio">
            <legend>Quem começa?</legend>
            <input type="radio" name="qi" id="6" value="1"><label for="6">X</label>
            <input type="radio" name="qi" id="7" value="2"><label for="7">O</label>
            <input type="radio" name="qi" id="8" value="3" checked><label for="8">Tanto faz!!!</label>
        </fieldset><br>

        <span class="x"><b>--X</b></span>
            <span class="o"><b>O</b></span>
                <input class="btn_start" type="submit" value="Bora Jogar!">
            <span class="o"><b>O</b></span>
        <span class="x"><b>X--</b></span>
    </form>
</div>
</body>
</html>