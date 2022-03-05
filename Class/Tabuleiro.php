<?php
//cria o tabuleiro e faz a solicitação de jogadas.
class Tabuleiro {

    public function __construct() {
        $_SESSION ['tabuleiro'] = $_SESSION ['tabuleiro'] ?? null;
        if ($_SESSION ['tabuleiro'] == null) {
            $_SESSION ['j'] = [array(1, 2, 3), array(4, 5, 6), array(7, 8, 9)];
            $_SESSION ['tabuleiro'] = true;
        }
    }//Cria o Array do tabuleiro e numera as casas.

    public function tab (): void{

        $_SESSION['form'] = $_SESSION['form'] ?? null;

        if ($_SESSION['x/o'] == 1 ){
            $_SESSION['form'] = 'X';
        }elseif ($_SESSION['x/o'] == 2){
            $_SESSION['form'] = 'O';
        }else{
            $_SESSION['form'] = null;
        }

        if ($_SESSION['form'] == 'X' || $_SESSION['form'] == 'O') {
            echo "Clique no local para '<b><span class='" . strtolower($_SESSION['form']) . "'>".$_SESSION['form']."</span></b>':</br>";
        }//solicita as jogadas de 'X' e 'O'.*/

        echo '<div class="background_grade"><hr class="linha_horizontal">';
            $k = 0;
            for ($i = 0; $i <= 2; $i++) {
                for ($j = 0; $j <= 2; $j++) {
                    $k++;
                    echo '<form class="btn" method="post" action="main.php">
                            <input type="hidden" name="'.$_SESSION['form'].'" value="' . $k . '">
                            <button class="btn" type="submit">' .$_SESSION['j'][$i][$j].'</button>
                          </form>
                    ';
                }
            }
        echo '</div>';//função para exibir o tabuleiro com as posições.*/
    }

}