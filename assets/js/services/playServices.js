ticTacToe.factory("playServices", function ($http, configs, $location) {

    const playController = configs.coreDefaultPath + 'controllers/playController.php';
    const boardController = configs.coreDefaultPath + 'controllers/boardController.php';

    const _postPlay = function (position, value) {

        let data = {
            position: position,
            value: value
        }

        $http.post(playController + '?method=postPositionPlay', data).then(function () {
            return true;
        }, function () {
            return false
        })
    }

    const invalidPlay = function () {
        alert('Jogada inválida, escolha outra posição!')
    }

    const _validateAndPlay = function (board, play, value) {

        for (let i = 1; i <= 9; i++) {
            switch (play) {
                case String(i):
                    _postPlay('J' + i, value)
                    return true
            }
        }

        invalidPlay();
        return false
    }

    const _resetGame = function () {
        if (confirm('Deseja realmente reiniciar o jogo e voltar ao menu?')) {
            $http.get(boardController + '?method=resetGame').then(function () {
                $location.path('/home');
            })
        }
    }

    function _getDifficulty(difficulty) {
        switch (difficulty) {
            case configs.easyCode:
                return configs.easyString;
            case configs.mediumCode:
                return configs.mediumString
            case configs.hardCode:
                return configs.hardString
        }
    }

    return {
        resetGameTabAndPlayer: _resetGame,
        validateAndPlay: _validateAndPlay,
        getDifficulty: _getDifficulty,
        postPlay: _postPlay,
    }

});