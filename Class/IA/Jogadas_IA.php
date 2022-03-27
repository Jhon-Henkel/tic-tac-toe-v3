<?php
require_once 'Ataque.php';
require_once 'Defesa.php';
require_once 'Padrao.php';
//Jogadas da IA 'O'.
class Jogadas_IA
{
    public function jogada_ia (): void
    {
        require '././banco/banco.php';

        $fim = new Fim_jogo();
        $def = new Defesa();
        $ata = new Ataque();

        $fim->setJaGanho('X');

        $b1 = $banco->query ("SELECT * FROM db_jogo_da_velha.tabuleiro WHERE id_tab = 1");
        $b2 = $banco->query ("SELECT IA, dific FROM db_jogo_da_velha.jogador WHERE id_jogador = 1");

        $reg1 = $b1->fetch_object();
        $reg2 = $b2->fetch_object();

        $q1 = "UPDATE db_jogo_da_velha.jogador SET IA = false WHERE id_jogador = 1";

        if ($reg2->dific == 'Extra-Fácil')
        {
            $df1 = $reg2->IA;
            while ($df1 == 1)
            {
                $ata->ataque_o();
                $r = rand(1, 9);
                for ($jxo=1; $jxo<=9; $jxo++)
                {
                    for ($jc = 0; $jc <= 2; $jc++)
                    {
                        for ($jl = 0; $jl <= 2; $jl++)
                        {
                            $tab = 'J'.$jc.$jl;
                            if ($r == $jxo && $reg1->$tab == $jxo)
                            {
                                padrao_o($tab);
                                $df1 = null;
                            }
                        }
                    }
                }
                if ($reg1->J00 != 1 &&
                    $reg1->J01 != 2 &&
                    $reg1->J02 != 3 &&
                    $reg1->J10 != 4 &&
                    $reg1->J11 != 5 &&
                    $reg1->J12 != 6 &&
                    $reg1->J20 != 7 &&
                    $reg1->J21 != 8 &&
                    $reg1->J22 != 9) {
                    $banco->query ($q1);
                }
            }
        }//final da dificuldade 1.

        if ($reg2->dific == 'Fácil' && $reg2->IA == 1)
        {
            $def->bloqueia();
            if ($reg2->IA == 1)
            {
                $r = rand(1, 2);
                if ($r == 1 && $reg1->J22 == 9)
                {
                    padrao_o('J22');
                } elseif ($r == 2 && $reg1->J20 == 7)
                {
                    padrao_o('J20');
                }else{
                    for ($jc = 0; $jc <=2; $jc++)
                    {
                        for ($jl = 0; $jl <=2; $jl++)
                        {
                            $tab = 'J'.$jc.$jl;
                            if ($reg2->IA == null)
                            {
                                break;
                            }elseif ($reg1->$tab == 3 || $reg1->$tab == 1 ||
                                $reg1->$tab == 4 || $reg1->$tab == 8 ||
                                $reg1->$tab == 6 || $reg1->$tab == 2 ||
                                $reg1->$tab == 5)
                            {
                                padrao_o($tab);
                            }
                        }
                    }
                }
            }
        }//final da dificuldade 2.

        if ($reg2->dific == 'Média' && $reg2->IA == 1)
        {
            $ata->ataque_o();
            $def->bloqueia();
            if ($reg2->IA == 1)
            {
                for ($jc = 0; $jc <=2; $jc++)
                {
                    for ($jl = 0; $jl <=2; $jl++)
                    {
                        $tab = 'J'.$jc.$jl;
                        if (!$reg2->IA)
                        {
                            break;
                        }elseif ($reg1->$tab == 9 || $reg1->$tab == 1 ||
                            $reg1->$tab == 3 || $reg1->$tab == 7 ||
                            $reg1->$tab == 4 || $reg1->$tab == 8 ||
                            $reg1->$tab == 6 || $reg1->$tab == 2 ||
                            $reg1->$tab == 5){
                            padrao_o($tab);
                            break;
                        }
                    }
                }
            }
        }//final da dificuldade 3.
    }//jogadas de 'O'.
}