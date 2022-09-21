ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($http, $scope, boardOne, boardTwo, player, configs, playServices, boardServices, computerPlay) {

    $scope.playerData = player.data
    $scope.boardOneData = boardOne.data
    $scope.boardTwoData = boardTwo.data
    $scope.difficultyLevel = playServices.getDifficulty($scope.playerData.difficulty)

    var itsEnd = false;

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O)
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    if ($scope.whosPlay === configs.oString) {
        computerPlayFunction()
    }

    function populateData(data) {
        $http.post(configs.ajaxUrl + '?method=postPositionPlay', data);
        $scope.boardTwoData[data.position] = data.value
    }

    function validateBoard() {
        if (!itsEnd) {
            if (boardServices.somebodyWin($scope.boardTwoData)) {
                itsEnd = true
                boardServices.gameOver('Parabéns jogador de ' + $scope.whosPlay.toUpperCase() + ' você ganhou!')
            }

            if (boardServices.gotOld($scope.boardTwoData)) {
                itsEnd = true
                boardServices.gameOver(configs.gotOld)
            }
        }
    }

    function computerPlayFunction() {
        let ia = computerPlay.computerPlay($scope.difficultyLevel, $scope.boardTwoData)
        if (ia !== false) {

            let data = {
                position: configs.tableString + String(ia),
                value: configs.oString
            }

            populateData(data);
            validateBoard();
            $scope.whosPlay = configs.xString
        }
    }

    $scope.validateAndPlay = function (play) {

        for (let count = 1; count <= 9; count++) {
            if (String(count) === play && $scope.whosPlay === configs.xString) {

                let data = {
                    position: configs.tableString + count,
                    value: configs.xString
                }

                if ($scope.boardTwoData[data.position] !== null) {
                    alert('Jogada inválida, escolha outra posição!')
                } else {
                    populateData(data);
                    validateBoard();
                    $scope.whosPlay = configs.oString
                    computerPlayFunction()
                }
            }
        }
    }
});