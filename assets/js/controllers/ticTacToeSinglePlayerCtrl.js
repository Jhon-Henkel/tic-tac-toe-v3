ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($scope, boardOne, boardTwo, player, configs, playServices, $route) {

    $scope.boardOneData = boardOne.data;
    $scope.boardTwoData = boardTwo.data;
    $scope.playerData = player.data;
    $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty);

    if (!$scope.whosPlay) {
        //o quem joga está ficando sempre aleatódio devido a linha abaixo, sempre que da o reload da rota, zera o scope dessa variavel
        $scope.whosPlay = getWhoPlay($scope.playerData.X_O);
    }

    function getWhoPlay(whoPlay) {

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

    $scope.resetGame = function () {
        playServices.resetGameTabAndPlayer()
    }

    $scope.validateAndPlay = function (play) {
        if (playServices.validateAndPlay($scope.boardOneData, play, $scope.whosPlay)) {
            $route.reload();
        }
    }
});