<?php session_start();
class Fim_jogo
{

    private string $fim_jogo; //faz a validação de fim de partida.
    private bool $ja_ganho; //valida se alguem já ganhou.

    public function getFimJogo():string
    {
        return $this->fim_jogo;
    }
    public function setFimJogo():void
    {
        require '././banco/banco.php';

        $b = $banco->query ("SELECT deu_velha FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $reg = $b->fetch_object();

        $fj = new Fim_jogo();
        $game_over = "<h1 class='center vermelho'>Game Over <br></h1>";
        $parabens = "<h2 class='center'>Parabéns jogador de ";
        $vcGanhou = "<br> Você ganhou!!!</h2>";

        if ($fj->setJaGanho('X'))
        {
            $_SESSION['X'] ++;
            $this->fim_jogo = $game_over.$parabens.'<span class="x">X</span>'.$vcGanhou;
            echo $this->fim_jogo;
        } elseif ($fj->setJaGanho('O'))
        {
            $_SESSION['O'] ++;
            $this->fim_jogo = $game_over.$parabens.'<span class="o">O</span>'.$vcGanhou;
            echo $this->fim_jogo;
        }elseif ($reg->deu_velha == 9)
        {
            $q = "UPDATE db_jogo_da_velha.jogador SET X_O = false, IA = false WHERE id_jogador = 1";
            $banco->query ($q);
            $this->fim_jogo = $game_over."<h2 class='center'>Deu Velha</br><span class='vermelho'>Ninguém ganhou!!!</span></h2>";
            echo $this->fim_jogo;
        }
    }

    public function getJaGanho():bool
    {
        return $this->ja_ganho;
    }
    public function setJaGanho($v):bool
    {
        require '././banco/banco.php';

        $b = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $q = "UPDATE db_jogo_da_velha.jogador SET X_O = false, IA = false WHERE id_jogador = 1";
        $reg = $b->fetch_object();

        if (($reg->J00 == $v && $reg->J01 == $v && $reg->J02 == $v)
            || ($reg->J10 == $v && $reg->J11 == $v && $reg->J12 == $v)
            || ($reg->J20 == $v && $reg->J21 == $v && $reg->J22 == $v)
            || ($reg->J00 == $v && $reg->J10 == $v && $reg->J20 == $v)
            || ($reg->J01 == $v && $reg->J11 == $v && $reg->J21 == $v)
            || ($reg->J02 == $v && $reg->J12 == $v && $reg->J22 == $v)
            || ($reg->J00 == $v && $reg->J11 == $v && $reg->J22 == $v)
            || ($reg->J20 == $v && $reg->J11 == $v && $reg->J02 == $v))
        {
            $this->ja_ganho = true;
            $banco->query ($q);
        }else
        {
            $this->ja_ganho = false;
        }
        return($this->ja_ganho);
    }
}