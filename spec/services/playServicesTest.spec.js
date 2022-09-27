describe('testePlayServices', function () {

    var playServicesTest, configsTest;

    beforeEach(function () {
        module('ngRoute')
        module('ticTacToe')
        inject(function (playServices, configs) {
            playServicesTest = playServices;
            configsTest = configs
        })
    })

    it('playServices service exists?', function () {
        expect(playServicesTest).toBeDefined()
    });

    it('methods exists?', function () {
        expect(playServicesTest.getDifficulty).toBeDefined()
        expect(playServicesTest.getWhoPlay).toBeDefined()
    });

    it('get difficulties?', function () {
        expect(playServicesTest.getDifficulty('1')).toBe('Fácil');
        expect(playServicesTest.getDifficulty('2')).toBe('Médio');
        expect(playServicesTest.getDifficulty('3')).toBe('Difícil');
        expect(playServicesTest.getDifficulty('4')).toBeUndefined();
        expect(playServicesTest.getDifficulty(1)).toBeUndefined();
        expect(playServicesTest.getDifficulty(2)).toBeUndefined();
        expect(playServicesTest.getDifficulty(3)).toBeUndefined();
        expect(playServicesTest.getDifficulty(4)).toBeUndefined();
    });

    it('get whoPlay?', function () {
        expect(playServicesTest.getWhoPlay('1')).toBe('x');
        expect(playServicesTest.getWhoPlay('2')).toBe('o');
        expect(playServicesTest.getWhoPlay('3')).toBeDefined();
        expect(playServicesTest.getWhoPlay('4')).toBeUndefined();
        expect(playServicesTest.getWhoPlay('x')).toBe('o');
        expect(playServicesTest.getWhoPlay('o')).toBe('x');
        expect(playServicesTest.getWhoPlay('t')).toBeUndefined();
    })
})