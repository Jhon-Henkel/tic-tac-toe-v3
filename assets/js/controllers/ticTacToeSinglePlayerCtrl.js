ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($http, $scope, boardOne, boardTwo, player, configs, playServices, boardServices, $route) {

    $scope.boardOneData = boardOne.data;
    $scope.boardTwoData = boardTwo.data;
    $scope.playerData = player.data;
    $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty);

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O);
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    $scope.validateAndPlay = function (play) {

            for (let count = 1; count <= 9; count++) {
                switch (play) {
                    case String(count):

                        let data = {
                            position: 'J' + count,
                            value: $scope.whosPlay
                        }

                        for (let count1 = 1; count1 <= 9; count1++) {
                            switch (data.position) {
                                case 'J' + String(count1):
                                    if ($scope.boardTwoData['J' + count1] !== null) {
                                        alert('Jogada inválida, escolha outra posição!')
                                    } else {
                                        $http.post(configs.ajaxUrl + '?method=postPositionPlay', data).then(function () {
                                            $scope.boardTwoData['J' + count1] = data.value
                                            $scope.whosPlay = playServices.getWhoPlay(data.value);
                                        })
                                    }
                                break;
                            }
                        }
                    console.log(data)
                }
            }
        // boardServices.somebodyWin();
        // boardServices.gotOld();
    }
});