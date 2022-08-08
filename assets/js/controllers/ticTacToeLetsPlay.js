angular.module("ticTacToe").controller("ticTacToeLetsPlayCtrl", function ($scope, $http, $location, configs) {

    $scope.sendPlay = function (play) {
        $http.post(configs.baseURL + 'core/views/lets-play.php', play)
        console.log(play);
    }
});