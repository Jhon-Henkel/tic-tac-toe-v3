ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($http, $scope, boardOne, boardTwo, player, configs, playServices, boardServices) {

    $scope.boardOneData = boardOne.data
    $scope.boardTwoData = boardTwo.data
    $scope.playerData = player.data
    $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty)

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O)
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    $scope.validateAndPlay = function (play) {

        //valida a jogada, salva no banco, exibe na tela e chama o próximo jogador.
        for (let count = 1; count <= 9; count++) {
            if (String(count) === play) {

                let data = {
                    position: 'J' + count,
                    value: $scope.whosPlay
                }

                if ($scope.boardTwoData[data.position] !== null) {
                    alert('Jogada inválida, escolha outra posição!')
                } else {
                    $http.post(configs.ajaxUrl + '?method=postPositionPlay', data).then(function () {
                        $scope.boardTwoData[data.position] = data.value

                        //valida se ja ganhou
                        if (boardServices.somebodyWin($scope.boardTwoData)) {
                            boardServices.gameOver('Parabéns jogador de ' + $scope.whosPlay.toUpperCase() + ' você ganhou!')
                        }

                        //valida se deu velha
                        if (boardServices.gotOld($scope.boardTwoData)) {
                            boardServices.gameOver('Deu velha, ninguém ganhou!')
                        }

                        $scope.whosPlay = playServices.getWhoPlay(data.value)
                    })
                }
            }
        }
        //jogada IA
    }
});