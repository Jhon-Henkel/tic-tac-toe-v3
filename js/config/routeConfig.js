angular.module("ticTacToe").config(function ($routeProvider) {
    $routeProvider.when("/home", {
        templateUrl: "view/home.html",
        controller: "ticTacToeHomeCtrl",
    });

    $routeProvider.when("/lets-play", {
        templateUrl: "view/game.html",
    });

    $routeProvider.when("/config", {
        templateUrl: "view/configurations.html",
        controller: "ticTacToeConfigCtrl",
    });

    $routeProvider.otherwise({redirectTo: "/home"});
});