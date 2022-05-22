angular.module("ticTacToe").controller("ticTacToeConfigCtrl", function ($scope, $http, $location, config, getConfig) {

    $scope.configData = getConfig.data;

    $scope.saveConfigDb = function (configDb) {
        $scope.checkData();
        $http.post(config.apiURL + 'saveConnectionDbPost.php', configDb).then(function () {
            alert('Dados salvos com sucesso!');
        }, function () {
            alert('Erro ao salvar configurações, verifique se o banco de dados está instalado e revise as configurações!');
        })
    }

    $scope.testConnection = function (configDb) {
        $scope.checkData();
        $http.post(config.apiURL + 'testConnectionDbPost.php', configDb).then(function () {
            alert('Teste de conexão realizado com sucesso!');
        }, function () {
            alert('Erro ao conectar no banco de dados, verifique se o banco de dados está instalado e revise as configurações!');
        })
    }

    $scope.createDb = function () {
        $http.post(config.apiURL + 'createConnectionDbPost.php', getConfig.data).then(function () {
            alert('Banco de dados criado com sucesso!');
            $location.path('#!/home')
        }, function () {
            alert('Erro ao criar banco de dados!')
        })

    }

    $scope.checkData = function () {
        if (!$scope.configData.host) {
            $scope.configData.host = config.defaultDbHost;
        }
        if (!$scope.configData.username) {
            $scope.configData.username = config.defaultDbUser;
        }
        if (!$scope.configData.password) {
            $scope.configData.password = config.defaultDbPassword;
        }
    }
});