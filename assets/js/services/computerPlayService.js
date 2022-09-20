ticTacToe.factory("computerPlay", function ($http, configs, boardServices, $location) {

    var ia = false;

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
            ia = true

            while (ia === true) {
                let rand = Math.floor(Math.random() * 9 + 1)

                if (board['J' + String(rand)] === null) {
                    ia = false;
                    return String(rand);
                }
            }
        }
    }

    function playMedium(board) {
        if (validations(board)) {
            ia = true

            while (ia === true) {
                let defended = defend(board);

                if (defended) {
                    console.log('caiu no defended ' + defended)
                    ia = false
                    return defended
                }

                if (ia === true) {

                    let rand = Math.floor(Math.random() * 2 + 1);

                    if (rand === 1 && board.J9 === null) {
                        ia = false
                        return '9';
                    } else if (rand === 2 && board.J7 === null) {
                        ia = false
                        return '7';
                    } else if (ia === false) {
                        break;
                    } else {
                        let position = Array(
                            configs.positionTopRight,
                            configs.positionTopLeft,
                            configs.positionMiddleLeft,
                            configs.positionBottomMiddle,
                            configs.positionMiddleRight,
                            configs.positionTopMiddle,
                            configs.positionMiddleMiddle
                        )

                        for (let i = 0; i < position.length; i++) {
                            if (board[configs.tableString + String(position[i])] === null) {
                                ia = false
                                return String(position[i]);
                            }
                        }
                        ia = false
                    }
                }
            }
        }
    }

    function playHard(board) {

        if (validations(board)) {

            ia = true

            attack(board)
            defend(board)

            if (ia === true) {

                for (let j = 0; j <= 9; j++) {
                    let position = configs.tableString + j;

                    if (ia === true) {
                        break;
                    } else if (board[position] === null) {
                        return String(j);
                    }
                }
            }
        }
    }

    function defend(board) {
        let player = configs.xString;
        
        if (validations(board)) {
            if (ia === true) {
                if (board[configs.topLeft] === player && board[configs.topMiddle] === player && board[configs.topLeft] === null) {
                    return '3';
                } else if (board[configs.topMiddle] === player && board[configs.topRight] === player && board[configs.topLeft] === null) {
                    return '1';
                } else if (board[configs.topLeft] === player && board[configs.topRight] === player && board[configs.topMiddle] === null) {
                    return '2';
                } else if (board[configs.middleLeft] === player && board[configs.middleMiddle] === player && board[configs.middleRight] === null) {
                    return '6';
                } else if (board[configs.middleMiddle] === player && board[configs.middleRight] === player && board[configs.middleLeft] === null) {
                    return '4';
                } else if (board[configs.middleLeft] === player && board[configs.middleRight] === player && board[configs.middleMiddle] === null) {
                    return '5';
                } else if (board[configs.bottomLeft] === player && board[configs.bottomMiddle] === player && board[configs.bottomRight] === null) {
                    return '9';
                } else if (board[configs.bottomMiddle] === player && board[configs.bottomRight] === player && board[configs.bottomLeft] === null) {
                    return '7';
                } else if (board[configs.bottomLeft] === player && board[configs.bottomRight] === player && board[configs.bottomMiddle] === null) {
                    return '8';
                } else if (board[configs.topLeft] === player && board[configs.middleLeft] === player && board[configs.bottomLeft] === null) {
                    return '7';
                } else if (board[configs.middleLeft] === player && board[configs.bottomLeft] === player && board[configs.topLeft] === null) {
                    return '1';
                } else if (board[configs.topLeft] === player && board[configs.bottomLeft] === player && board[configs.middleLeft] === null) {
                    return '4';
                } else if (board[configs.topMiddle] === player && board[configs.middleMiddle] === player && board[configs.bottomMiddle] === null) {
                    return '8';
                } else if (board[configs.middleMiddle] === player && board[configs.bottomMiddle] === player && board[configs.topMiddle] === null) {
                    return '2';
                } else if (board[configs.topMiddle] === player && board[configs.bottomMiddle] === player && board[configs.middleMiddle] === null) {
                    return '5';
                } else if (board[configs.topRight] === player && board[configs.middleRight] === player && board[configs.bottomRight] === null) {
                    return '9';
                } else if (board[configs.middleRight] === player && board[configs.bottomRight] === player && board[configs.topRight] === null) {
                    return '3';
                } else if (board[configs.topRight] === player && board[configs.bottomRight] === player && board[configs.middleRight] === null) {
                    return '6';
                } else if (board[configs.topLeft] === player && board[configs.middleMiddle] === player && board[configs.bottomRight] === null) {
                    return '9';
                } else if (board[configs.middleMiddle] === player && board[configs.bottomRight] === player && board[configs.topLeft] === null) {
                    return '1';
                } else if (board[configs.topLeft] === player && board[configs.bottomRight] === player && board[configs.middleMiddle] === null) {
                    return '5';
                } else if (board[configs.bottomLeft] === player && board[configs.middleMiddle] === player && board[configs.topRight] === null) {
                    return '3';
                } else if (board[configs.middleMiddle] === player && board[configs.topRight] === player && board[configs.bottomLeft] === null) {
                    return '7';
                } else if (board[configs.bottomLeft] === player && board[configs.topRight] === player && board[configs.middleMiddle] === null) {
                    return '5';
                }
            }
        }
    }

    function attack(board) {
        let opponent = configs.xString;

        if (validations(board)) {
            if (ia === true) {
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
        }
    }
    
    function defaultContentForAttackAndDefend(position) {

        if (ia === true) {
            ia = false;
            return
        }
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