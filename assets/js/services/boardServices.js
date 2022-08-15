ticTacToe.factory("boardServices", function ($http, configs, $location) {

    const boardController = configs.coreDefaultPath + 'controllers/boardController.php';

    const _getBoardOne = function () {
        return $http.get(boardController + '?method=getBoardOneData');
    }

    const _getBoardTwo = function () {
        return $http.get(boardController + '?method=getBoardTwoData');
    }

    const _resetGame = function () {
        if (confirm('Deseja realmente reiniciar o jogo e voltar ao menu?')) {
            $http.get(boardController + '?method=resetGame').then(function () {
                $location.path('/home');
            })
        }
    }

    const _gameOver = function (message) {
        $http.get(boardController + '?method=resetGame').then(function () {
            alert('Game Over! \n' + message)
            $location.path('/home');
        })
    }

    function _somebodyWin() {
        $http.get(boardController + '?method=somebodyWin').then(function (response) {
            if (response.data.win === 'x') {
                _gameOver('Parabéns jogador de X você ganhou!')
            } else if (response.data.win === 'o') {
                _gameOver('Parabéns jogador de O você ganhou!')
            }
        })
    }

    function _gotOld() {
        $http.get(boardController + '?method=gotOld').then(function (response) {
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