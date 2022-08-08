ticTacToe.controller("ticTacToeHomeCtrl", function ($scope, $http, $location, configs) {

    $scope.game = {};

    $scope.letsStart = function (game) {
        if (!$scope.game.player || $scope.game.player === "") {
            $scope.game.player = 1;
        }

        if (!$scope.game.init || $scope.game.init === "") {
            $scope.game.init = 3;
        }

        $http.post(configs.coreDefaultPath + 'controllers/gameStartController.php', game).then(function () {
            if ($scope.game.player === 1){
                $location.path('/single-player');
            }
            if ($scope.game.player === 2) {
                $location.path('/multi-player');
            }
        }, function () {
            alert("Erro ao iniciar jogo");
        })
    }
});