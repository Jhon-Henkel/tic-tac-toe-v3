angular.module("ticTacToe").controller("ticTacToeConfigCtrl", function ($scope, $http, $location, config) {
    $scope.home = function () {
        $location.path('/#!/home');
    }

    $scope.config = function (config) {

    }

    $scope.testConnection = function (config) {

    }
});