angular.module("ticTacToe").factory("databaseAPI", function ($http, config) {

    const _getConfigs = function () {
        return $http.get(config.apiURL + "/configConnectionDbGet.php");
    };

    return {
        getConfigs: _getConfigs,
    };
});