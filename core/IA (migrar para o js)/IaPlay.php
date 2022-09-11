<?php

///////// conforme for migrando ir apagando
///
///
///
///
///
        if ($ResultPlayer->difficulty == VALOR_MEDIA && $ResultPlayer->IA == VALOR_IA_ON)
        {
            $defend->defend();
            if ($ResultPlayer->IA == VALOR_IA_ON) {
                $random = rand(1, 2);
                if ($random == 1 && $resultBoard->J9 == 9) {
                    defaultIa\padrao_o('J9');
                } elseif ($random == 2 && $resultBoard->J7 == 7) {
                    defaultIa\padrao_o('J7');
                } else {
                    for ($j = 0; $j <= 9; $j++) {
                        $board = STRING_TABULEIRO . $j;
                        if (!$ResultPlayer->IA) {
                            break;
                        } elseif (
                            $resultBoard->$board == 3
                            || $resultBoard->$board == 1
                            || $resultBoard->$board == 4
                            || $resultBoard->$board == 8
                            || $resultBoard->$board == 6
                            || $resultBoard->$board == 2
                            || $resultBoard->$board == 5
                        ) {
                            defaultIa\padrao_o($board);
                        }
                    }
                }
            }
        }

        if ($ResultPlayer->difficulty == VALOR_DIFICIL && $ResultPlayer->IA == VALOR_IA_ON) {
            $attack->attack();
            $defend->defend();
            if ($ResultPlayer->IA == VALOR_IA_ON) {
                for ($j = 0; $j <= 9; $j++) {
                    $board = STRING_TABULEIRO . $j;
                    if (!$ResultPlayer->IA) {
                        break;
                    } elseif (
                        $resultBoard->$board == 9
                        || $resultBoard->$board == 1
                        || $resultBoard->$board == 3
                        || $resultBoard->$board == 7
                        || $resultBoard->$board == 4
                        || $resultBoard->$board == 8
                        || $resultBoard->$board == 6
                        || $resultBoard->$board == 2
                        || $resultBoard->$board == 5
                    ) {
                        defaultIa\padrao_o($board);
                        break;
                    }
                }
            }
        }