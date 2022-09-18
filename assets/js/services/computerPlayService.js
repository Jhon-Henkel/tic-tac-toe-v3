ticTacToe.factory("computerPlay", function ($http, configs, boardServices, $location) {

    function _computerPlay(difficulty, board) {
        switch (difficulty) {
            case configs.easyString:
                return playEasy(board)
            case configs.mediumString:
                return playMedium(board)
            case configs.hardString:
                return playHard(board)
        }
    }

    function validations(board) {
        if (boardServices.somebodyWin(board)) {
            return false
        }

        if (boardServices.gotOld(board)) {
            boardServices.gameOver(configs.gotOld)
        }

        return true
    }

    function playEasy(board) {

        if (validations(board)) {
            let ia = true

            while (ia === true) {
                let rand = Math.floor(Math.random() * 9 + 1)

                if (board['J' + String(rand)] === null) {
                    ia = false;
                    return
                }
            }
        }
    }

    function playMedium(board) {
        if (validations(board)) {
            let ia = true

            while (ia === true) {
                defend();

                if (validarseaindaéOquejoga) {

                    let rand = Math.floor(Math.random() * 2 + 1);

                    if (rand === 1 && board.J9 === '9') {
                        defaultContentForAttackAndDefend('J9')
                    } else if (rand === 2 && board.J7 === '7') {
                        defaultContentForAttackAndDefend('J7')
                    } else {
                        for (let j = 0; j <= 9; j++) {
                            let position = configs.tableString + j;

                            if (validarseaindaéOquejoga) {
                                break;
                            } else if (
                                board.position === 3
                                || board.position === 1
                                || board.position === 4
                                || board.position === 8
                                || board.position === 6
                                || board.position === 2
                                || board.position === 5
                            ) {
                                defaultContentForAttackAndDefend(position);
                                break;
                            }
                        }
                    }
                }
            }
        }
    }

    function playHard(board) {
        attack()
        defend()

        if (validarseaindaéOquejoga) {

            for (let j = 0; j <= 9; j++) {
                let position = configs.tableString + j;

                if (validarseaindaéOquejoga) {
                    break;
                } else if (
                    board.position === 9
                    || board.position === 1
                    || board.position === 3
                    || board.position === 7
                    || board.position === 4
                    || board.position === 6
                    || board.position === 2
                    || board.position === 5
                ) {
                    defaultContentForAttackAndDefend(position);
                    break;
                }
            }
        }
    }

    function defend(board) {
        let player = configs.oString;
        
        //validar se ainda é vez de O e se ninguém ganhou
        if (board.J1 === player && board.J2 === player && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J2 === player && board.J3 === player && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === player && board.J3 === player && board.J2 === 2) {
            defaultContentForAttackAndDefend('J2');
        } else if (board.J4 === player && board.J5 === player && board.J6 === 6) {
            defaultContentForAttackAndDefend('J6');
        } else if (board.J5 === player && board.J6 === player && board.J4 === 4) {
            defaultContentForAttackAndDefend('J4');
        } else if (board.J4 === player && board.J6 === player && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J7 === player && board.J8 === player && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J8 === player && board.J9 === player && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J7 === player && board.J9 === player && board.J8 === 8) {
            defaultContentForAttackAndDefend('J8');
        } else if (board.J1 === player && board.J4 === player && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J4 === player && board.J7 === player && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === player && board.J7 === player && board.J4 === 4) {
            defaultContentForAttackAndDefend('J4');
        } else if (board.J2 === player && board.J5 === player && board.J8 === 8) {
            defaultContentForAttackAndDefend('J8');
        } else if (board.J5 === player && board.J8 === player && board.J2 === 2) {
            defaultContentForAttackAndDefend('J2');
        } else if (board.J2 === player && board.J8 === player && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J3 === player && board.J6 === player && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J6 === player && board.J9 === player && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J3 === player && board.J9 === player && board.J6 === 6) {
            defaultContentForAttackAndDefend('J6');
        } else if (board.J1 === player && board.J5 === player && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J5 === player && board.J9 === player && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === player && board.J9 === player && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J7 === player && board.J5 === player && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J5 === player && board.J3 === player && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J7 === player && board.J3 === player && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        }
    }

    function attack(board) {
        let opponent = configs.xString;

        //validar se ainda é vez de O e se ninguém ganhou
        if (
            board.J1 === opponent && board.J5 === 5
            || board.J3 === opponent && board.J5 === 5
            || board.J7 === opponent && board.J5 === 5
            || board.J9 === opponent && board.J5 === 5
        ) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J1 === opponent && board.J2 === opponent && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J2 === opponent && board.J3 === opponent && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === opponent && board.J3 === opponent && board.J2 === 2) {
            defaultContentForAttackAndDefend('J2');
        } else if (board.J4 === opponent && board.J5 === opponent && board.J6 === 6) {
            defaultContentForAttackAndDefend('J6');
        } else if (board.J5 === opponent && board.J6 === opponent && board.J4 === 4) {
            defaultContentForAttackAndDefend('J4');
        } else if (board.J4 === opponent && board.J6 === opponent && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J7 === opponent && board.J8 === opponent && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J8 === opponent && board.J9 === opponent && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J7 === opponent && board.J9 === opponent && board.J8 === 8) {
            defaultContentForAttackAndDefend('J8');
        } else if (board.J1 === opponent && board.J4 === opponent && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J4 === opponent && board.J7 === opponent && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === opponent && board.J7 === opponent && board.J4 === 4) {
            defaultContentForAttackAndDefend('J4');
        } else if (board.J2 === opponent && board.J5 === opponent && board.J8 === 8) {
            defaultContentForAttackAndDefend('J8');
        } else if (board.J5 === opponent && board.J8 === opponent && board.J2 === 2) {
            defaultContentForAttackAndDefend('J2');
        } else if (board.J2 === opponent && board.J8 === opponent && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J3 === opponent && board.J6 === opponent && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J6 === opponent && board.J9 === opponent && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J3 === opponent && board.J9 === opponent && board.J6 === 6) {
            defaultContentForAttackAndDefend('J6');
        } else if (board.J1 === opponent && board.J5 === opponent && board.J9 === 9) {
            defaultContentForAttackAndDefend('J9');
        } else if (board.J5 === opponent && board.J9 === opponent && board.J1 === 1) {
            defaultContentForAttackAndDefend('J1');
        } else if (board.J1 === opponent && board.J9 === opponent && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        } else if (board.J7 === opponent && board.J5 === opponent && board.J3 === 3) {
            defaultContentForAttackAndDefend('J3');
        } else if (board.J5 === opponent && board.J3 === opponent && board.J7 === 7) {
            defaultContentForAttackAndDefend('J7');
        } else if (board.J7 === opponent && board.J3 === opponent && board.J5 === 5) {
            defaultContentForAttackAndDefend('J5');
        }
    }
    
    function defaultContentForAttackAndDefend(position) {
        /*
        validar se é a ia que joga ainda
        faz a jogada
        faz update do gotOld
         */
    }

    return {
        computerPlay: _computerPlay
    }
});