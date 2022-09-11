ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($http, $scope, boardOne, boardTwo, player, configs, playServices, boardServices, computerPlay) {

    $scope.boardOneData = boardOne.data
    $scope.boardTwoData = boardTwo.data
    $scope.playerData = player.data

    //comentado pois foi fixado o id da dificuldade que estou desenvolvendo
    // $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty)
    $scope.difficultyLevel = playServices.getDifficulty(String(2))

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O)
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    if ($scope.whosPlay === 'o') {
        computerPlayFunction()
    }

    function populateData(data) {
        $http.post(configs.ajaxUrl + '?method=postPositionPlay', data);
        $scope.boardTwoData[data.position] = data.value
    }

    function validateBoard() {
        if (boardServices.somebodyWin($scope.boardTwoData)) {
            boardServices.gameOver('Parabéns jogador de ' + $scope.whosPlay.toUpperCase() + ' você ganhou!')
        }

        if (boardServices.gotOld($scope.boardTwoData)) {
            boardServices.gameOver(configs.gotOld)
        }
    }

    function computerPlayFunction() {
        let ia = computerPlay.computerPlay($scope.difficultyLevel, $scope.boardTwoData)
        if (ia !== false) {

            let data = {
                position: 'J' + String(ia),
                value: 'o'
            }

            populateData(data);
            validateBoard();

            $scope.whosPlay = 'x'
        }
    }

    $scope.validateAndPlay = function (play) {

        for (let count = 1; count <= 9; count++) {
            if (String(count) === play && $scope.whosPlay === 'x') {

                let data = {
                    position: 'J' + count,
                    value: 'x'
                }

                if ($scope.boardTwoData[data.position] !== null) {

                    alert('Jogada inválida, escolha outra posição!')

                } else {

                    populateData(data);
                    validateBoard();

                    $scope.whosPlay = 'o'

                    computerPlayFunction()
                }
            }
        }
    }
});