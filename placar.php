<?php session_start() ?>
<div class="placar">
    <p class="placarX">X</p>
    <p class="placarO">O</p>
    <hr class="linhaPlacar">
    <br>
    <?php
        echo '<p class="x placarXnum">'.$_SESSION['X'].'</p>';
        echo '<p class="o placarOnum">'.$_SESSION['O'].'</p>';

        if ($_SESSION['botaoResetPlacar']) {
            echo '<form class="center" method="post" action="./reset_placar.php">
                        <label>
                            <input class= "btn_reset" type="submit" value="Zerar Placar">
                        </label>
                  </form>'
            ;
        }
    ?>
</div>
