ticTacToe.controller("ticTacToeSinglePlayerCtrl", function ($scope, boardOne, boardTwo, player) {

    $scope.boardOneData = boardOne.data;
    $scope.boardTwoData = boardTwo.data;
    $scope.playerData = player.data;
    console.log($scope.playerData)
    // $scope.difficultyLevel = getDifficulty($scope.playerData.difficulty);
    //
    // if (!$scope.whosPlay) {
    //     $scope.whosPlay = getWhosPlay($scope.playerData.X_O);
    // }
    //
    // function getDifficulty(difficulty) {
    //     switch (difficulty) {
    //         case '1':
    //             return 'Fácil';
    //         case '2':
    //             return 'Média'
    //         case '3':
    //             return 'Difícil'
    //     }
    // }
    //
    // function getWhosPlay(whosPlay) {
    //     switch (whosPlay) {
    //         case '1':
    //             return 'x';
    //         case '2':
    //             return 'o';
    //         case '3':
    //             return 'x';
    //     }
    // }
    //
    // $scope.play = function (play) {
    //     console.log(play);
    // }
});