describe('testePlayServices', function () {

    var playerServicesTest;

    beforeEach(function () {
        module('ngRoute')
        module('ticTacToe')
        inject(function (playerServices) {
            playerServicesTest = playerServices;
        })
        spyOn(playerServicesTest, 'getPlayer').and.callThrough()
    })

    it('playerServices service exists?', function () {
        expect(playerServicesTest).toBeDefined()
    });

    it('methods exists?', function () {
        expect(playerServicesTest.getPlayer).toBeDefined()
    });

    it('get player?', function () {
        expect(playerServicesTest.getPlayer()).toBeTruthy()
    });
})