<?php
session_start();
class Fim_jogo {

    private string $fim_jogo; //faz a validação de fim de partida.
    private bool $ja_ganho; //valida se alguem já ganhou.

    public function getFimJogo():string {
        return $this->fim_jogo;
    }
    public function setFimJogo():void {
        $fj = new Fim_jogo();
        $parabens = "<h2 class='center'>Parabéns jogador de ";
        $vcGanhou = "</br> Você ganhou!!!</h2>";

        if ($fj->setJaGanho($_SESSION['X_fixo'])) {
            $this->fim_jogo = $parabens.$_SESSION['X_fixo'].$vcGanhou;
            echo $this->fim_jogo;

        } elseif ($fj->setJaGanho($_SESSION['O_fixo'])) {
            $this->fim_jogo = $parabens.$_SESSION['O_fixo'].$vcGanhou;
            echo $this->fim_jogo;

        }elseif ($_SESSION['deu_velha'] == 9) {
            $_SESSION['x/o'] = false;
            $_SESSION['ia'] = false;
            $this->fim_jogo = "<h2 class='center'>Deu Velha</br>" . "<span class='vermelho'>Ninguém ganhou!!!</span></h2>";
            echo $this->fim_jogo;
        }
    }

    public function getJaGanho():bool {
        return $this->ja_ganho;
    }
    public function setJaGanho($v):bool {
        if (($_SESSION['j'][0][1] == $v && $_SESSION['j'][0][0] == $v && $_SESSION['j'][0][2] == $v)
            || ($_SESSION['j'][1][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][1][2] == $v)
            || ($_SESSION['j'][2][0] == $v && $_SESSION['j'][2][1] == $v && $_SESSION['j'][2][2] == $v)
            || ($_SESSION['j'][0][0] == $v && $_SESSION['j'][1][0] == $v && $_SESSION['j'][2][0] == $v)
            || ($_SESSION['j'][0][1] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][2][1] == $v)
            || ($_SESSION['j'][0][2] == $v && $_SESSION['j'][1][2] == $v && $_SESSION['j'][2][2] == $v)
            || ($_SESSION['j'][0][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][2][2] == $v)
            || ($_SESSION['j'][2][0] == $v && $_SESSION['j'][1][1] == $v && $_SESSION['j'][0][2] == $v)) {
            $this->ja_ganho = true;
            $_SESSION['x/o'] = false;
            $_SESSION['ia'] = false;
        }else{
            $this->ja_ganho = false;
        }
        return($this->ja_ganho);
    }
}