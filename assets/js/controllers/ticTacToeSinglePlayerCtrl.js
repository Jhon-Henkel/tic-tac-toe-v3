ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($scope, boardOne, boardTwo, player, configs, playServices, boardServices, $route) {

    $scope.boardOneData = boardOne.data;
    $scope.boardTwoData = boardTwo.data;
    $scope.playerData = player.data;
    $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty);

    if (!$scope.whosPlay) {
        //o quem joga está ficando sempre aleatório devido à linha abaixo, sempre que da o reload da rota, zera o $scope dessa variavel
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O);
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    $scope.validateAndPlay = function (play) {
        if (playServices.validateAndPlay($scope.boardOneData, play, $scope.whosPlay)) {
            boardServices.somebodyWin();
            boardServices.gotOld();
            // $route.reload();
        }
    }
});