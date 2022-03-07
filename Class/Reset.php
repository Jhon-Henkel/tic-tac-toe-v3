<?php
//formulario de reset.
class Reset {
    function reset_game (): void {
        echo '
        <form class="reset" method="post" action="../../Jogo-da-velha-V3/Reset_Game.php">
            <label>
                <input class= "btn_reset" type="submit" value="Reset!">
            </label>
        </form>
    ';
    }
}