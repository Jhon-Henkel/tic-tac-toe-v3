ticTacToe.factory("boardServices", function ($http, configs, $location) {

    const _getBoardOne = function () {
        return $http.get(configs.ajaxUrl + '?method=getBoardOneData');
    }

    const _getBoardTwo = function () {
        return $http.get(configs.ajaxUrl + '?method=getBoardTwoData');
    }

    const _resetGame = function () {
        if (confirm('Deseja realmente reiniciar o jogo e voltar ao menu?')) {
            $http.get(configs.ajaxUrl + '?method=resetGame').then(function () {
                $location.path('/home');
            })
        }
    }

    const _gameOver = function (message) {
        $http.get(configs.ajaxUrl + '?method=resetGame').then(function () {
            alert('Game Over! \n' + message)
            $location.path('/home');
        })
    }

    function _somebodyWin(board) {

        let value = 'x'
        for (let count = 1; count <=2; count++) {
            if (
                (board.J1 === value && board.J2 === value && board.J3 === value)
                || (board.J4 === value && board.J5 === value && board.J6 === value)
                || (board.J7 === value && board.J8 === value && board.J9 === value)
                || (board.J1 === value && board.J4 === value && board.J7 === value)
                || (board.J2 === value && board.J5 === value && board.J8 === value)
                || (board.J3 === value && board.J6 === value && board.J9 === value)
                || (board.J1 === value && board.J5 === value && board.J9 === value)
                || (board.J3 === value && board.J5 === value && board.J7 === value)
            ){
                return true
            }
            value = 'o'
        }
        return false
    }

    function _gotOld(board) {

        if (
            board.J1 !== null && board.J2 !== null && board.J3 !== null
            && board.J4 !== null && board.J5 !== null && board.J6 !== null
            && board.J7 !== null && board.J8 !== null && board.J9 !== null
        ) {
            if (!this.somebodyWin(board)) {
                return true
            }
        }
        return false
    }

    return {
        resetGameTabAndPlayer: _resetGame,
        somebodyWin: _somebodyWin,
        getBoardOne: _getBoardOne,
        getBoardTwo: _getBoardTwo,
        gameOver: _gameOver,
        gotOld: _gotOld,
    };
});