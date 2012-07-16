require "TennisGame"
require "test/unit"

class TennisGameTests < Test::Unit::TestCase

    def test_run_suite
        getScore(0, 0, "Love-All", 'player1', 'player2')
        getScore(1, 1, "Fifteen-All", 'player1', 'player2')
        getScore(2, 2, "Thirty-All", 'player1', 'player2')
        getScore(3, 3, "Forty-All", 'player1', 'player2')
        getScore(4, 4, "Deuce", 'player1', 'player2')

        getScore(1, 0, "Fifteen-Love", 'player1', 'player2')
        getScore(0, 1, "Love-Fifteen", 'player1', 'player2')
        getScore(2, 0, "Thirty-Love", 'player1', 'player2')
        getScore(0, 2, "Love-Thirty", 'player1', 'player2')
        getScore(3, 0, "Forty-Love", 'player1', 'player2')
        getScore(0, 3, "Love-Forty", 'player1', 'player2')
        getScore(4, 0, "Win for player1", 'player1', 'player2')
        getScore(0, 4, "Win for player2", 'player1', 'player2')

        getScore(2, 1, "Thirty-Fifteen", 'player1', 'player2')
        getScore(1, 2, "Fifteen-Thirty", 'player1', 'player2')
        getScore(3, 1, "Forty-Fifteen", 'player1', 'player2')
        getScore(1, 3, "Fifteen-Forty", 'player1', 'player2')
        getScore(4, 1, "Win for player1", 'player1', 'player2')
        getScore(1, 4, "Win for player2", 'player1', 'player2')

        getScore(3, 2, "Forty-Thirty", 'player1', 'player2')
        getScore(2, 3, "Thirty-Forty", 'player1', 'player2')
        getScore(4, 2, "Win for player1", 'player1', 'player2')
        getScore(2, 4, "Win for player2", 'player1', 'player2')

        getScore(4, 3, "Advantage player1", 'player1', 'player2')
        getScore(3, 4, "Advantage player2", 'player1', 'player2')
        getScore(5, 4, "Advantage player1", 'player1', 'player2')
        getScore(4, 5, "Advantage player2", 'player1', 'player2')
        getScore(15, 14, "Advantage player1", 'player1', 'player2')
        getScore(14, 15, "Advantage player2", 'player1', 'player2')

        getScore(6, 4, 'Win for player1', 'player1', 'player2')
        getScore(4, 6, 'Win for player2', 'player1', 'player2')
        getScore(16, 14, 'Win for player1', 'player1', 'player2')
        getScore(14, 16, 'Win for player2', 'player1', 'player2')

        getScore(6, 4, 'Win for One', 'One', 'player2')
        getScore(4, 6, 'Win for Two', 'player1', 'Two')
        getScore(6, 5, 'Advantage One', 'One', 'player2')
        getScore(5, 6, 'Advantage Two', 'player1', 'Two') 

    end

    def getScore(p1Points, p2Points, score, p1Name, p2Name)

        game = TennisGame.new(p1Name, p2Name)
        for i in 1..p1Points
            game.won_point(p1Name)
        end
        for i in 1..p2Points
            game.won_point(p2Name)
        end
        assert_equal(score, game.score())
    end

end