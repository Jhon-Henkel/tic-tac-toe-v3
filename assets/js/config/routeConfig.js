ticTacToe.config(function ($routeProvider) {
    $routeProvider.when("/home", {
        templateUrl: "core/views/home.html",
        controller: "ticTacToeHomeCtrl",
    });

    $routeProvider.when("/single-player", {
        templateUrl: "core/views/board.html",
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
        templateUrl: "core/views/board.html",
        controller: "ticTacToeMultiPlayerCtrl",
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

    $routeProvider.otherwise({redirectTo: "/home"});
});