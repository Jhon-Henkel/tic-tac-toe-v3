describe('testePlayServices', function () {

    let boardServicesTest;

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

    it('position 1, 2 and 3 \'x\' win ?', function () {
        let board = {J1: 'x', J2: 'x', J3: 'x', J4: null, J5: null, J6: null, J7: null, J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 4, 5 and 6 \'x\' win ?', function () {
        let board = {J1: null, J2: null, J3: null, J4: 'x', J5: 'x', J6: 'x', J7: null, J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 7, 8 and 9 \'x\' win ?', function () {
        let board = {J1: null, J2: null, J3: null, J4: null, J5: null, J6: null, J7: 'x', J8: 'x', J9: 'x'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 1, 4 and 7 \'x\' win ?', function () {
        let board = {J1: 'x', J2: null, J3: null, J4: 'x', J5: null, J6: null, J7: 'x', J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 2, 5 and 8 \'x\' win ?', function () {
        let board = {J1: null, J2: 'x', J3: null, J4: null, J5: 'x', J6: null, J7: null, J8: 'x', J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 3, 6 and 9 \'x\' win ?', function () {
        let board = {J1: null, J2: null, J3: 'x', J4: null, J5: null, J6: 'x', J7: null, J8: null, J9: 'x'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 7, 5 and 3 \'x\' win ?', function () {
        let board = {J1: null, J2: null, J3: 'x', J4: null, J5: 'x', J6: null, J7: 'x', J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 1, 5 and 9 \'x\' win ?', function () {
        let board = {J1: 'x', J2: null, J3: null, J4: null, J5: 'x', J6: null, J7: null, J8: null, J9: 'x'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });
    it('position 1, 2 and 3 \'o\' win ?', function () {
        let board = {J1: 'o', J2: 'o', J3: 'o', J4: null, J5: null, J6: null, J7: null, J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 4, 5 and 6 \'o\' win ?', function () {
        let board = {J1: null, J2: null, J3: null, J4: 'o', J5: 'o', J6: 'o', J7: null, J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 7, 8 and 9 \'o\' win ?', function () {
        let board = {J1: null, J2: null, J3: null, J4: null, J5: null, J6: null, J7: 'o', J8: 'o', J9: 'o'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 1, 4 and 7 \'o\' win ?', function () {
        let board = {J1: 'o', J2: null, J3: null, J4: 'o', J5: null, J6: null, J7: 'o', J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 2, 5 and 8 \'o\' win ?', function () {
        let board = {J1: null, J2: 'o', J3: null, J4: null, J5: 'o', J6: null, J7: null, J8: 'o', J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 3, 6 and 9 \'o\' win ?', function () {
        let board = {J1: null, J2: null, J3: 'o', J4: null, J5: null, J6: 'o', J7: null, J8: null, J9: 'o'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 7, 5 and 3 \'o\' win ?', function () {
        let board = {J1: null, J2: null, J3: 'o', J4: null, J5: 'o', J6: null, J7: 'o', J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('position 1, 5 and 9 \'o\' win ?', function () {
        let board = {J1: 'o', J2: null, J3: null, J4: null, J5: 'o', J6: null, J7: null, J8: null, J9: 'o'}
        expect(boardServicesTest.somebodyWin(board)).toBeTruthy()
    });

    it('nobody win ?', function () {
        let board = {J1: null, J2: null, J3: null, J4: null, J5: null, J6: null, J7: null, J8: null, J9: null}
        expect(boardServicesTest.somebodyWin(board)).toBeFalse()
    });

    it('gotOld board null?', function () {
        let board = {J1: null, J2: null, J3: null, J4: null, J5: null, J6: null, J7: null, J8: null, J9: null}
        expect(boardServicesTest.gotOld(board)).toBeFalse()
    })

    it('gotOld board not null and somebody win?', function () {
        let board = {
            J1: 'x', J2: 'o', J3: 'x',
            J4: 'o', J5: 'o', J6: 'x',
            J7: 'x', J8: 'x', J9: 'x'
        }
        expect(boardServicesTest.gotOld(board)).toBeFalse()
    });

    it('gotOld board not null and somebody not win?', function () {
        let board = {
            J1: 'x', J2: 'o', J3: 'x',
            J4: 'o', J5: 'o', J6: 'x',
            J7: 'x', J8: 'x', J9: 'o'
        }
        expect(boardServicesTest.gotOld(board)).toBeTruthy()
    });

    it('validateBoard board not null and somebody not win?', function () {
        let board = {
            J1: 'x', J2: 'o', J3: 'x',
            J4: 'o', J5: 'o', J6: 'x',
            J7: 'x', J8: 'x', J9: 'o'
        }
        expect(boardServicesTest.validateBoard(board, 'o')).toBeTruthy()
    });

    it('validateBoard board not null and somebody win?', function () {
        let board = {
            J1: 'x', J2: 'o', J3: 'x',
            J4: 'o', J5: 'o', J6: 'x',
            J7: 'x', J8: 'x', J9: 'x'
        }
        expect(boardServicesTest.validateBoard(board, 'x')).toBeTruthy()
    });
})