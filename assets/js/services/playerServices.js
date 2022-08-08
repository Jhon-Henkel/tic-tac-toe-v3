ticTacToe.factory("playerServices", function ($http, configs) {

    const playerController = configs.coreDefaultPath + 'controllers/playerController.php';

    const _getPlayer = function () {
        return $http.get(playerController + '?method=getPlayerData');
    }

    return {
        getPlayer: _getPlayer,
    };
});