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

    function _somebodyWin() {
        $http.get(configs.ajaxUrl + '?method=somebodyWin').then(function (response) {
            if (response.data.win === 'x') {
                _gameOver('Parabéns jogador de X você ganhou!')
            } else if (response.data.win === 'o') {
                _gameOver('Parabéns jogador de O você ganhou!')
            }
        })
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
    };
});