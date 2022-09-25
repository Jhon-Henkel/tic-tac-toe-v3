ticTacToe.controller("ticTacToeHomeCtrl", function ($scope, $http, $location, configs) {

    $scope.game = {};

    $scope.letsStart = function (game) {
        if (!$scope.game.player || $scope.game.player === "") {
            $scope.game.player = configs.singlePlayer;
        }

        if (!$scope.game.init || $scope.game.init === "") {
            $scope.game.init = configs.randCode;
        }

        if (!$scope.game.difficulty || $scope.game.difficulty === "") {
            $scope.game.difficulty = configs.mediumCode;
        }

        $http.post(configs.coreDefaultPath + 'controllers/gameStartController.php', game).then(function () {
            if ($scope.game.player === configs.singlePlayer){
                $location.path('/single-player');
            }
            if ($scope.game.player === configs.multiPlayer) {
                $location.path('/multi-player');
            }
        }, function () {
            alert("Erro ao iniciar jogo, não foi possível se comunicar com o banco de dados.");
        })
    }
});