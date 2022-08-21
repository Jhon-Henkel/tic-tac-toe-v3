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

            let rand = Math.floor(Math.random() * 8)

            for (let count = 1; count <= 9; count ++) {
                if (board['J' + String(rand)] === null) {
                    return rand
                }
            }
        }
    }
    return false
    }

    function playMedium(board) {

    }

    function playHard(board) {

    }

    return {
        computerPlay: _computerPlay
    }
});