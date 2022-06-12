angular.module("ticTacToe").controller("ticTacToeLetsPlayCtrl", function ($scope, $http, $location, config) {

    $scope.sendPlay = function (play) {
        $http.post(config.baseURL + 'view/lets-play.php', play)
        console.log(play);
    }
});