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

                        $http.post(configs.ajaxUrl + '?method=postPositionPlay', data).then(function () {

                            switch (data.position) {
                                case 'J1':
                                    $scope.boardTwoData.J1 = data.value
                                    break;
                                case 'J2':
                                    $scope.boardTwoData.J2 = data.value
                                    break;
                                case 'J3':
                                    $scope.boardTwoData.J3 = data.value
                                    break;
                                case 'J4':
                                    $scope.boardTwoData.J4 = data.value
                                    break;
                                case 'J5':
                                    $scope.boardTwoData.J5 = data.value
                                    break;
                                case 'J6':
                                    $scope.boardTwoData.J6 = data.value
                                    break;
                                case 'J7':
                                    $scope.boardTwoData.J7 = data.value
                                    break;
                                case 'J8':
                                    $scope.boardTwoData.J8 = data.value
                                    break;
                                case 'J9':
                                    $scope.boardTwoData.J9 = data.value
                                    break;
                            }

                            $scope.whosPlay = playServices.getWhoPlay(data.value);

                            console.log(data)
                        })
                }
            }

        // alert('Jogada inválida, escolha outra posição!')

        // return false
        // boardServices.somebodyWin();
        // boardServices.gotOld();
    }
});