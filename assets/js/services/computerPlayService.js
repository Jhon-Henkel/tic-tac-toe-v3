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

            }
        }
    }

    function playHard(board) {

    }

    function defend() {

    }

    function attack() {

    }

    return {
        computerPlay: _computerPlay
    }
});