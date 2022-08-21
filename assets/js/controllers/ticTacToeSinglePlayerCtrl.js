ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($http, $scope, boardOne, boardTwo, player, configs, playServices, boardServices, computerPlay) {

    $scope.boardOneData = boardOne.data
    $scope.boardTwoData = boardTwo.data
    $scope.playerData = player.data
    // $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty)
    $scope.difficultyLevel = playServices.getDifficulty(String(1))

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O)
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    if ($scope.whosPlay === 'o') {
        computerPlayF()
    }

    function syncDelay(milliseconds){
        let start = new Date().getTime();
        let end=0;
        while( (end-start) < milliseconds){
            end = new Date().getTime();
        }
    }

    function computerPlayF() {
        let ia = computerPlay.computerPlay($scope.difficultyLevel, $scope.boardTwoData)
        if (ia !== false) {

            let data = {
                position: 'J' + String(ia),
                value: 'o'
            }

            $http.post(configs.ajaxUrl + '?method=postPositionPlay', data).then(function () {
                $scope.boardTwoData[data.position] = data.value

                // valida se ja ganhou
                if (boardServices.somebodyWin($scope.boardTwoData)) {
                    boardServices.gameOver('Parabéns jogador de ' + $scope.whosPlay.toUpperCase() + ' você ganhou!')
                }

                // valida se deu velha
                if (boardServices.gotOld($scope.boardTwoData)) {
                    boardServices.gameOver(configs.gotOld)
                }

                $scope.whosPlay = 'x'
            })
        }
    }

    $scope.validateAndPlay = function (play) {

        //valida a jogada, salva no banco, exibe na tela e chama o próximo jogador.
        for (let count = 1; count <= 9; count++) {
            if (String(count) === play && $scope.whosPlay === 'x') {

                let data = {
                    position: 'J' + count,
                    value: 'x'
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
                            boardServices.gameOver(configs.gotOld)
                        }

                        $scope.whosPlay = 'o'

                        computerPlayF()
                    })
                }
            }
        }
    }
});