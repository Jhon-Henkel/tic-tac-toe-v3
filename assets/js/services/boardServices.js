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

        let player = configs.xString
        for (let count = 1; count <=2; count++) {
            if (
                (board[configs.topLeft] === player && board[configs.topMiddle] === player && board[configs.topRight] === player)
                || (board[configs.middleLeft] === player && board[configs.middleMiddle] === player && board[configs.middleRight] === player)
                || (board[configs.bottomLeft] === player && board[configs.bottomMiddle] === player && board[configs.bottomRight] === player)
                || (board[configs.topLeft] === player && board[configs.middleLeft] === player && board[configs.bottomLeft] === player)
                || (board[configs.topMiddle] === player && board[configs.middleMiddle] === player && board[configs.bottomMiddle] === player)
                || (board[configs.topRight] === player && board[configs.middleRight] === player && board[configs.bottomRight] === player)
                || (board[configs.topLeft] === player && board[configs.middleMiddle] === player && board[configs.bottomRight] === player)
                || (board[configs.topRight] === player && board[configs.middleMiddle] === player && board[configs.bottomLeft] === player)
            ){
                return true
            }
            player = configs.oString
        }
        return false
    }

    function _gotOld(board) {

        if (
            board[configs.topLeft] !== null && board[configs.topMiddle] !== null && board[configs.topRight] !== null
            && board[configs.middleLeft] !== null && board[configs.middleMiddle] !== null && board[configs.middleRight] !== null
            && board[configs.bottomLeft] !== null && board[configs.bottomMiddle] !== null && board[configs.bottomRight] !== null
        ) {
            if (!this.somebodyWin(board)) {
                return true
            }
        }
        return false
    }

    function _validateBoard(board, player) {
        if (this.somebodyWin(board)) {
            this.gameOver('Parabéns jogador de ' + player.toUpperCase() + ' você ganhou!')
            return true
        }

        if (this.gotOld(board)) {
            this.gameOver(configs.gotOld)
            return true
        }
        return false
    }

    return {
        resetGameTabAndPlayer: _resetGame,
        validateBoard: _validateBoard,
        somebodyWin: _somebodyWin,
        getBoardOne: _getBoardOne,
        getBoardTwo: _getBoardTwo,
        gameOver: _gameOver,
        gotOld: _gotOld,
    };
});