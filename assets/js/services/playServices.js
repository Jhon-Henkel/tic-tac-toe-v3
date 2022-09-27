ticTacToe.factory("playServices", function (configs) {

    function _getDifficulty(difficulty) {
        switch (difficulty) {
            case configs.easyCode:
                return configs.easyString;
            case configs.mediumCode:
                return configs.mediumString
            case configs.hardCode:
                return configs.hardString
        }
    }

    function _getWhoPlay(whoPlay) {

        if (whoPlay === configs.randCode) {
            let rand = Math.floor(Math.random() * 2)
            whoPlay = String(rand + 1);
        }

        switch (whoPlay) {
            case configs.xCode:
                return configs.xString;
            case configs.oCode:
                return configs.oString;
            case configs.oString:
                return configs.xString;
            case configs.xString:
                return configs.oString;
        }
    }

    return {
        getDifficulty: _getDifficulty,
        getWhoPlay: _getWhoPlay,
    }

});