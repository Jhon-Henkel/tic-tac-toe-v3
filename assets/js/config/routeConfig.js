angular.module("ticTacToe").config(function ($routeProvider) {
    $routeProvider.when("/home", {
        templateUrl: "core/views/home.html",
        controller: "ticTacToeHomeCtrl",
    });

    $routeProvider.when("/lets-play", {
        templateUrl: "core/views/lets-play.php",
        controller: "ticTacToeLetsPlayCtrl",
    });

    $routeProvider.otherwise({redirectTo: "/home"});
});