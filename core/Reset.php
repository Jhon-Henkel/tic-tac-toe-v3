<?php
namespace reset;

class Reset
{
    function resetGame (): void
    {
        ?>
        <form class="reset" method="post" action="../Reset_Game.php">
            <label>
                <input class= "btn_reset" type="submit" value="Reset!">
            </label>
        </form>
    <?php
    }
}