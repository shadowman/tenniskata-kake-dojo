class TennisGame

    def initialize(player1Name, player2Name)
        @player1Name = player1Name
        @player2Name = player2Name
        @p1points = 0
        @p2points = 0
        @resultNames = {
                0 => "Love-All",
                1 => "Fifteen-All",
                2 => "Thirty-All",
                3 => "Forty-All",
            }
        @resultNamesSimple = {
                0 => "Love",
                1 => "Fifteen",
                2 => "Thirty",
                3 => "Forty",
        }
    end
        
    def won_point(playerName)
        if (playerName == @player1Name)
            @p1points += 1
        else
            @p2points += 1
        end
    end
    
    def score()
        result = ""
        tempScore=0
        if (@p1points==@p2points)
            result = @resultNames.fetch(@p1points, "Deuce")
        elsif (@p1points>=4 or @p2points>=4)
            minusResult = @p1points-@p2points
            if (minusResult==1)
                result ="Advantage " + @player1Name
            elsif (minusResult ==-1)
                result ="Advantage " + @player2Name
            elsif (minusResult>=2)
                result = "Win for " + @player1Name
            else
                result ="Win for " + @player2Name
            end
        else
            for i in 1..2
                if (i==1)
                    tempScore = @p1points
                else
                    result+="-"
                    tempScore = @p2points
                end
                result += @resultNamesSimple.fetch(tempScore)
            end
        end
        result
    end

end