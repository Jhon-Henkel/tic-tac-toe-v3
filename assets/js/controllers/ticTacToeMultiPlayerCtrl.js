ticTacToe.controller("ticTacToeMultiPlayerCtrl", function ($scope, $http, $location, configs, player, boardOne, boardTwo, playServices, boardServices) {

    $scope.playerData = player.data
    $scope.boardOneData = boardOne.data
    $scope.boardTwoData = boardTwo.data

    var itsEnd = false;

    if (!$scope.whosPlay) {
        $scope.whosPlay = playServices.getWhoPlay($scope.playerData.X_O)
    }

    $scope.resetGame = function () {
        boardServices.resetGameTabAndPlayer()
    }

    function populateData(data) {
        $http.post(configs.ajaxUrl + '?method=postPositionPlay', data);
        $scope.boardTwoData[data.position] = data.value
    }

    function validateBoard() {
        if (!itsEnd) {
            if (boardServices.validateBoard($scope.boardTwoData, $scope.whosPlay)) {
                itsEnd = true
            }
        }
    }

    $scope.validateAndPlay = function (play) {

        for (let count = 1; count <= 9; count++) {
            if (String(count) === play) {

                let data = {
                    position: configs.tableString + count,
                    value: $scope.whosPlay
                }

                if ($scope.boardTwoData[data.position] !== null) {
                    alert('Jogada inválida, escolha outra posição!')
                } else {
                    populateData(data);
                    validateBoard();
                    $scope.whosPlay = playServices.getWhoPlay($scope.whosPlay)
                }
            }
        }
    }
});