<?php

class TennisGame
{

    private $player1Name;
    private $player2Name;
    private $p1points;
    private $p2points;
    private $resultNames;
    private $resultNamesSimple;
    
    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->p1points = 0;
        $this->p2points = 0;
        $this->resultNames = array(
            'Love-All',
            'Fifteen-All',
            'Thirty-All',
            'Forty-All'
        );
        $this->resultNamesSimple = array(
            'Love',
            'Fifteen',
            'Thirty',
            'Forty'
        );
    }

    public function won_point($playerName)
    {
        if ($playerName == $this->player1Name)
            $this->p1points += 1;
        else $this->p2points +=1;
    }

    public function score()
    {
        $result = '';
        $tempScore = 0;
        if ($this->p1points == $this->p2points)
        {
            if ($this->p1points > 3) $result = 'Deuce';
            else $result = $this->resultNames[$this->p1points];
        }
        else if ($this->p1points >= 4 || $this->p2points >= 4)
        {
            $minusResult = $this->p1points - $this->p2points;
            if ($minusResult == 1)
                $result = 'Advantage ' . $this->player1Name;
            else if ($minusResult == -1)
                $result = 'Advantage ' . $this->player2Name;
            else if ($minusResult >= 2)
                $result = 'Win for ' . $this->player1Name;
            else
                $result = 'Win for ' . $this->player2Name;
        }
        else
        {
            for ($i=1; $i <= 2; $i++)
            { 
                if ($i == 1)
                    $tempScore = $this->p1points;
                else
                {
                    $result .= '-';
                    $tempScore = $this->p2points;
                }
                $result .= $this->resultNamesSimple[$tempScore];
            }
        } 
        return $result; 
    }
}