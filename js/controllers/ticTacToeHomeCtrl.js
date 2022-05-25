angular.module("ticTacToe").controller("ticTacToeHomeCtrl", function ($scope, $http, $location, config) {
    $scope.game = {};
    $scope.letsStart = function (game) {
        if (!$scope.game.player || $scope.game.player === "") {
            $scope.game.player = 1;
        }
        if (!$scope.game.init || $scope.game.init === "") {
            $scope.game.init = 3;
        }

        $http.post(config.apiDefaultUrl + 'initialGamePost.php', game).then(function () {
            $location.path('/lets-play');
        }, function (response) {
            alert("Erro ao iniciar jogo " + response);
        })
    }
});