ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($scope, boardOne, boardTwo, player, configs, playServices, boardServices) {

    $scope.boardOneData = boardOne.data;
    $scope.boardTwoData = boardTwo.data;
    $scope.playerData = player.data;
    $scope.difficultyLevel = getDifficulty($scope.playerData.difficulty);

    if (!$scope.whosPlay) {
        $scope.whosPlay = getWhosPlay($scope.playerData.X_O);
    }

    function getDifficulty(difficulty) {
        switch (difficulty) {
            case configs.easyCode:
                return configs.easyString;
            case configs.mediumCode:
                return configs.mediumString
            case configs.hardCode:
                return configs.hardString
        }
    }

    function getWhosPlay(whosPlay) {

        if (whosPlay === configs.randCode) {
            let rand = Math.floor(Math.random() * 2)
            whosPlay = String(rand + 1);
        }

        switch (whosPlay) {
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

    $scope.validateAndPlay = function (play) {
        if (playServices.validateAndPlay($scope.boardOneData, play, $scope.whosPlay)){
            $scope.whosPlay = getWhosPlay($scope.whosPlay);
            console.log($scope.boardOneData);

        }
    }
});