ticTacToe.factory("boardServices", function ($http, configs) {

    const boardController = configs.coreDefaultPath + 'controllers/boardController.php';

    const _getBoardOne = function () {
        return $http.get(boardController + '?method=getBoardOneData');
    }

    const _getBoardTwo = function () {
        return $http.get(boardController + '?method=getBoardTwoData');
    }

    return {
        getBoardOne: _getBoardOne,
        getBoardTwo: _getBoardTwo,
    };
});