describe('testePlayServices', function () {

    var boardServicesTest;

    beforeEach(function () {
        module('ngRoute')
        module('ticTacToe')
        inject(function (boardServices) {
            boardServicesTest = boardServices;
        })
        spyOn(boardServicesTest, 'resetGameTabAndPlayer').and.callThrough()
        spyOn(boardServicesTest, 'getBoardOne').and.callThrough()
        spyOn(boardServicesTest, 'getBoardTwo').and.callThrough()
        spyOn(boardServicesTest, 'gameOver').and.callThrough()
    })

    it('boardServices service exists?', function () {
        expect(boardServicesTest).toBeDefined()
    });

    it('methods exists?', function () {
        expect(boardServicesTest.resetGameTabAndPlayer).toBeDefined()
        expect(boardServicesTest.validateBoard).toBeDefined()
        expect(boardServicesTest.somebodyWin).toBeDefined()
        expect(boardServicesTest.getBoardOne).toBeDefined()
        expect(boardServicesTest.getBoardTwo).toBeDefined()
        expect(boardServicesTest.gameOver).toBeDefined()
        expect(boardServicesTest.gotOld).toBeDefined()
    });

    /*
    somebodyWin
    gotOld
    validateBoard
     */

    it('somebodyWin ?', function () {

    });
})