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

    function _gotOld() {
        $http.get(configs.ajaxUrl + '?method=gotOld').then(function (response) {
            if (response.data.gotOldValue === '8') {
                _gameOver('Deu velha!');
            }
        })
    }

    return {
        resetGameTabAndPlayer: _resetGame,
        somebodyWin: _somebodyWin,
        getBoardOne: _getBoardOne,
        getBoardTwo: _getBoardTwo,
        gotOld: _gotOld,
        gameOver: _gameOver,
    };
});