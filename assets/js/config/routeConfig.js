ticTacToe.config(function ($routeProvider) {
    $routeProvider.when("/home", {
        templateUrl: "core/views/home.html",
        controller: "ticTacToeHomeCtrl",
    });

    $routeProvider.when("/single-player", {
        templateUrl: "core/views/singlePlayer.html",
        controller: "ticTacToeSinglePlayerCtrl",
        resolve: {
            boardOne: function (boardServices) {
                return boardServices.getBoardOne();
            },
            boardTwo: function (boardServices) {
                return boardServices.getBoardTwo();
            },
            player: function (playerServices) {
                return playerServices.getPlayer();
            }
        }
    });

    $routeProvider.when("/multi-player", {
        templateUrl: "core/views/multiPlayer.html",
        controller: "ticTacToeMultiPlayerCtrl",
    });

    $routeProvider.otherwise({redirectTo: "/home"});
});