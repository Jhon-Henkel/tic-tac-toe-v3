ticTacToe.factory("playerServices", function ($http, configs) {

    const _getPlayer = function () {
        return $http.get(configs.ajaxUrl + '?method=getPlayerData');
    }

    return {
        getPlayer: _getPlayer,
    };
});