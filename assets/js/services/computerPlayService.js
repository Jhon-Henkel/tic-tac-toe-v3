ticTacToe.factory("computerPlay", function (configs, boardServices) {

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
        return !(boardServices.somebodyWin(board) || boardServices.gotOld(board));
    }

    function playEasy(board) {

        if (validations(board)) {
            ia = true

            while (ia === true) {
                let rand = Math.floor(Math.random() * 9 + 1)

                if (board[configs.tableString + String(rand)] === null) {
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
                    ia = false
                    return defended
                }

                let rand = Math.floor(Math.random() * 2 + 1);

                if (rand === 1 && board[configs.bottomRight] === null) {
                    ia = false
                    return configs.positionBottomRight;
                } else if (rand === 2 && board[configs.bottomLeft] === null) {
                    ia = false
                    return configs.positionBottomLeft;
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

    function playHard(board) {

        if (validations(board)) {

            ia = true

            while (ia === true) {
                let attacked = attack(board);
                let defended = defend(board);

                if (attacked) {
                    ia = false
                    return attacked
                }

                if (defended) {
                    ia = false
                    return defended
                }

                if (ia === true) {
                    let position = Array(
                        configs.positionBottomRight,
                        configs.positionTopLeft,
                        configs.positionTopRight,
                        configs.positionBottomLeft,
                        configs.positionMiddleLeft,
                        configs.positionMiddleRight,
                        configs.positionTopMiddle,
                        configs.positionMiddleMiddle,
                        configs.positionBottomMiddle
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

    function defend(board) {
        let opponent = configs.xString;

        if (validations(board)) {
            if (ia === true) {
                if (board[configs.topLeft] === opponent && board[configs.topMiddle] === opponent && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.topMiddle] === opponent && board[configs.topRight] === opponent && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === opponent && board[configs.topRight] === opponent && board[configs.topMiddle] === null) {
                    return configs.positionTopMiddle;
                } else if (board[configs.middleLeft] === opponent && board[configs.middleMiddle] === opponent && board[configs.middleRight] === null) {
                    return configs.positionMiddleRight;
                } else if (board[configs.middleMiddle] === opponent && board[configs.middleRight] === opponent && board[configs.middleLeft] === null) {
                    return configs.positionMiddleLeft;
                } else if (board[configs.middleLeft] === opponent && board[configs.middleRight] === opponent && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.bottomLeft] === opponent && board[configs.bottomMiddle] === opponent && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.bottomMiddle] === opponent && board[configs.bottomRight] === opponent && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.bottomLeft] === opponent && board[configs.bottomRight] === opponent && board[configs.bottomMiddle] === null) {
                    return configs.positionBottomMiddle;
                } else if (board[configs.topLeft] === opponent && board[configs.middleLeft] === opponent && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.middleLeft] === opponent && board[configs.bottomLeft] === opponent && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === opponent && board[configs.bottomLeft] === opponent && board[configs.middleLeft] === null) {
                    return configs.positionMiddleLeft;
                } else if (board[configs.topMiddle] === opponent && board[configs.middleMiddle] === opponent && board[configs.bottomMiddle] === null) {
                    return configs.positionBottomMiddle;
                } else if (board[configs.middleMiddle] === opponent && board[configs.bottomMiddle] === opponent && board[configs.topMiddle] === null) {
                    return configs.positionTopMiddle;
                } else if (board[configs.topMiddle] === opponent && board[configs.bottomMiddle] === opponent && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.topRight] === opponent && board[configs.middleRight] === opponent && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.middleRight] === opponent && board[configs.bottomRight] === opponent && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.topRight] === opponent && board[configs.bottomRight] === opponent && board[configs.middleRight] === null) {
                    return configs.positionMiddleRight;
                } else if (board[configs.topLeft] === opponent && board[configs.middleMiddle] === opponent && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.middleMiddle] === opponent && board[configs.bottomRight] === opponent && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === opponent && board[configs.bottomRight] === opponent && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.bottomLeft] === opponent && board[configs.middleMiddle] === opponent && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.middleMiddle] === opponent && board[configs.topRight] === opponent && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.bottomLeft] === opponent && board[configs.topRight] === opponent && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                }
                return null
            }
        }
    }

    function attack(board) {
        let player = configs.oString;

        if (validations(board)) {
            if (ia === true) {
                if (
                    board[configs.topLeft] === player && board[configs.middleMiddle] === null
                    || board[configs.topRight] === player && board[configs.middleMiddle] === null
                    || board[configs.bottomLeft] === player && board[configs.middleMiddle] === null
                    || board[configs.bottomRight] === player && board[configs.middleMiddle] === null
                ) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.topLeft] === player && board[configs.topMiddle] === player && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.topMiddle] === player && board[configs.topRight] === player && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === player && board[configs.topRight] === player && board[configs.topMiddle] === null) {
                    return configs.positionTopMiddle;
                } else if (board[configs.middleLeft] === player && board[configs.middleMiddle] === player && board[configs.middleRight] === null) {
                    return configs.positionMiddleRight;
                } else if (board[configs.middleMiddle] === player && board[configs.middleRight] === player && board[configs.middleLeft] === null) {
                    return configs.positionMiddleLeft;
                } else if (board[configs.middleLeft] === player && board[configs.middleRight] === player && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.bottomLeft] === player && board[configs.bottomMiddle] === player && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.bottomMiddle] === player && board[configs.bottomRight] === player && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.bottomLeft] === player && board[configs.bottomRight] === player && board[configs.bottomMiddle] === null) {
                    return configs.positionBottomMiddle;
                } else if (board[configs.topLeft] === player && board[configs.middleLeft] === player && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.middleLeft] === player && board[configs.bottomLeft] === player && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === player && board[configs.bottomLeft] === player && board[configs.middleLeft] === null) {
                    return configs.positionMiddleLeft;
                } else if (board[configs.topMiddle] === player && board[configs.middleMiddle] === player && board[configs.bottomMiddle] === null) {
                    return configs.positionBottomMiddle;
                } else if (board[configs.middleMiddle] === player && board[configs.bottomMiddle] === player && board[configs.topMiddle] === null) {
                    return configs.positionTopMiddle;
                } else if (board[configs.topMiddle] === player && board[configs.bottomMiddle] === player && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.topRight] === player && board[configs.middleRight] === player && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.middleRight] === player && board[configs.bottomRight] === player && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.topRight] === player && board[configs.bottomRight] === player && board[configs.middleRight] === null) {
                    return configs.positionMiddleRight;
                } else if (board[configs.topLeft] === player && board[configs.middleMiddle] === player && board[configs.bottomRight] === null) {
                    return configs.positionBottomRight;
                } else if (board[configs.middleMiddle] === player && board[configs.bottomRight] === player && board[configs.topLeft] === null) {
                    return configs.positionTopLeft;
                } else if (board[configs.topLeft] === player && board[configs.bottomRight] === player && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                } else if (board[configs.bottomLeft] === player && board[configs.middleMiddle] === player && board[configs.topRight] === null) {
                    return configs.positionTopRight;
                } else if (board[configs.middleMiddle] === player && board[configs.topRight] === player && board[configs.bottomLeft] === null) {
                    return configs.positionBottomLeft;
                } else if (board[configs.bottomLeft] === player && board[configs.topRight] === player && board[configs.middleMiddle] === null) {
                    return configs.positionMiddleMiddle;
                }
                return null
            }
        }
    }

    return {
        computerPlay: _computerPlay
    }
});