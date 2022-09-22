ticTacToe.constant("configs", {

    //url's
    coreDefaultPath: 'http://' + window.location.hostname + window.location.pathname + 'core/',
    ajaxUrl: 'http://' + window.location.hostname + window.location.pathname + 'core/ajax.php',

    //players
    singlePlayer: 1,
    multiPlayer: 2,

    //X_O
    xString:    "x",
    oString:    "o",
    xCode:      String(1),
    oCode:      String(2),
    randCode:   String(3),

    //difficulty
    easyString:     "Fácil",
    mediumString:   "Médio",
    hardString:     "Difícil",
    easyCode:       String(1),
    mediumCode:     String(2),
    hardCode:       String(3),

    //messages
    gotOld: "Deu velha, ninguém ganhou!",

    //tabuleiro
    tableString: "J",

    //posições da tabela
    topLeft:        "J1",
    topMiddle:      "J2",
    topRight:       "J3",
    middleLeft:     "J4",
    middleMiddle:   "J5",
    middleRight:    "J6",
    bottomLeft:     "J7",
    bottomMiddle:   "J8",
    bottomRight:    "J9",

    //posições em número
    positionTopLeft:        String(1),
    positionTopMiddle:      String(2),
    positionTopRight:       String(3),
    positionMiddleLeft:     String(4),
    positionMiddleMiddle:   String(5),
    positionMiddleRight:    String(6),
    positionBottomLeft:     String(7),
    positionBottomMiddle:   String(8),
    positionBottomRight:    String(9),
});