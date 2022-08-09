ticTacToe.factory("playServices", function ($http, configs) {

    const playController = configs.coreDefaultPath + 'controllers/playController.php';

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
        alert('Jogada inválida')
    }

    const _validateAndPlay = function (board, play, value) {

        switch (play) {
            case '1':
                if (board.J1 !== '1') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J1', value);
                    return true
                }
            case '2':
                if (board.J2 !== '2') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J2', value);
                    return true
                }
            case '3':
                if (board.J3 !== '3') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J3', value);
                    return true
                }
            case '4':
                if (board.J4 !== '4') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J4', value);
                    return true
                }
            case '5':
                if (board.J5 !== '5') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J5', value);
                    return true
                }
            case '6':
                if (board.J6 !== '6') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J6', value);
                    return true
                }
            case '7':
                if (board.J7 !== '7') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J7', value);
                    return true
                }
            case '8':
                if (board.J8 !== '8') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J8', value);
                    return true
                }
            case '9':
                if (board.J9 !== '9') {
                    invalidPlay();
                    return false
                } else {
                    _postPlay('J9', value);
                    return true
                }
        }
    }

    const _resetBoard = function () {

    }

    return {
        postPlay: _postPlay,
        validateAndPlay: _validateAndPlay,
        resetBoard: _resetBoard,
    }

});