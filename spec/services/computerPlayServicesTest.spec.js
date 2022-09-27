describe('testePlayServices', function () {

    var computerPlayServiceTest, configsTest, boardServicesTest;

    beforeEach(function () {
        module('ngRoute')
        module('ticTacToe')
        inject(function (computerPlay, configs, boardServices) {
            computerPlayServiceTest = computerPlay;
            boardServicesTest = boardServices;
            configsTest = configs;
        })
    })

    it('computerServices service exists?', function () {
        expect(computerPlayServiceTest).toBeDefined()
    });

    it('methods exists?', function () {
        expect(computerPlayServiceTest.computerPlay).toBeDefined();
    });
})