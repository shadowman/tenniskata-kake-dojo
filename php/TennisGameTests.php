<?php

require_once 'TennisGame.php';

class TennisGameTests extends PHPUnit_Framework_TestCase
{
    
    public function ScoreProvider()
    {
        return array(
            array(0, 0, "Love-All", 'player1', 'player2'),
            array(1, 1, "Fifteen-All", 'player1', 'player2'),
            array(2, 2, "Thirty-All", 'player1', 'player2'),
            array(3, 3, "Forty-All", 'player1', 'player2'),
            array(4, 4, "Deuce", 'player1', 'player2'),

            array(1, 0, "Fifteen-Love", 'player1', 'player2'),
            array(0, 1, "Love-Fifteen", 'player1', 'player2'),
            array(2, 0, "Thirty-Love", 'player1', 'player2'),
            array(0, 2, "Love-Thirty", 'player1', 'player2'),
            array(3, 0, "Forty-Love", 'player1', 'player2'),
            array(0, 3, "Love-Forty", 'player1', 'player2'),
            array(4, 0, "Win for player1", 'player1', 'player2'),
            array(0, 4, "Win for player2", 'player1', 'player2'),

            array(2, 1, "Thirty-Fifteen", 'player1', 'player2'),
            array(1, 2, "Fifteen-Thirty", 'player1', 'player2'),
            array(3, 1, "Forty-Fifteen", 'player1', 'player2'),
            array(1, 3, "Fifteen-Forty", 'player1', 'player2'),
            array(4, 1, "Win for player1", 'player1', 'player2'),
            array(1, 4, "Win for player2", 'player1', 'player2'),

            array(3, 2, "Forty-Thirty", 'player1', 'player2'),
            array(2, 3, "Thirty-Forty", 'player1', 'player2'),
            array(4, 2, "Win for player1", 'player1', 'player2'),
            array(2, 4, "Win for player2", 'player1', 'player2'),

            array(4, 3, "Advantage player1", 'player1', 'player2'),
            array(3, 4, "Advantage player2", 'player1', 'player2'),
            array(5, 4, "Advantage player1", 'player1', 'player2'),
            array(4, 5, "Advantage player2", 'player1', 'player2'),
            array(15, 14, "Advantage player1", 'player1', 'player2'),
            array(14, 15, "Advantage player2", 'player1', 'player2'),

            array(6, 4, 'Win for player1', 'player1', 'player2'), 
            array(4, 6, 'Win for player2', 'player1', 'player2'), 
            array(16, 14, 'Win for player1', 'player1', 'player2'), 
            array(14, 16, 'Win for player2', 'player1', 'player2'), 

            array(6, 4, 'Win for One', 'One', 'player2'),
            array(4, 6, 'Win for Two', 'player1', 'Two'), 
            array(6, 5, 'Advantage One', 'One', 'player2'),
            array(5, 6, 'Advantage Two', 'player1', 'Two') 
        );
    }

    /**
     * @test
     * @dataProvider ScoreProvider
     */
    public function test_get_score($p1points, $p2points, $score, $p1Name, $p2Name)
    {
        $game = new TennisGame($p1Name, $p2Name);
        for ($i=0; $i < $p1points; $i++) 
            $game->won_point($p1Name);
        for ($i=0; $i < $p2points; $i++) 
            $game->won_point($p2Name);
        $this->assertEquals($score, $game->score());
    }
}