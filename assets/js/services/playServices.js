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

    const _invalidPlay = function () {
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

        _invalidPlay();
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

    function _getWhoPlay(whoPlay) {

        if (whoPlay === configs.randCode) {
            let rand = Math.floor(Math.random() * 2)
            whoPlay = String(rand + 1);
        }

        switch (whoPlay) {
            case configs.xCode:
                return configs.xString;
            case configs.oCode:
                return configs.oString;
            case configs.oString:
                return configs.xString;
            case configs.xString:
                return configs.oString;
        }
    }

    return {
        resetGameTabAndPlayer: _resetGame,
        validateAndPlay: _validateAndPlay,
        getDifficulty: _getDifficulty,
        postPlay: _postPlay,
        getWhoPlay: _getWhoPlay,
    }

});