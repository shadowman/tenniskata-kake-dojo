namespace TennisKata.Defactored1
{
    public class TennisGame
    {
        private int _score1 = 0;
        private int _score2 = 0;
        private string _player1Name;
        private string _player2Name;

        public TennisGame(string player1Name, string player2Name)
        {
            this._player1Name = player1Name;
            this._player2Name = player2Name;
        }

        public void WonPoint(string playerName)
        {
            if (playerName == "player1")
                _score1 += 1;
            else
                _score2 += 1;
        }

        public string GetScore()
        {
            string score = "";
            int tempScore = 0;
            if (_score1 == _score2)
            {
                switch (_score1)
                {
                    case 0:
                        score = "Love-All";
                        break;
                    case 1:
                        score = "Fifteen-All";
                        break;
                    case 2:
                        score = "Thirty-All";
                        break;
                    case 3:
                        score = "Forty-All";
                        break;
                    default:
                        score = "Deuce";
                        break;

                }
            }
            else if (_score1 >= 4 || _score2 >= 4)
            {
                int minusResult = _score1 - _score2;
                if (minusResult == 1) score = "Advantage player1";
                else if (minusResult == -1) score = "Advantage player2";
                else if (minusResult >= 2) score = "Win for player1";
                else score = "Win for player2";
            }
            else
            {
                for (int i = 1; i < 3; i++)
                {
                    if (i == 1) tempScore = _score1;
                    else { score += "-"; tempScore = _score2; }
                    switch (tempScore)
                    {
                        case 0:
                            score += "Love";
                            break;
                        case 1:
                            score += "Fifteen";
                            break;
                        case 2:
                            score += "Thirty";
                            break;
                        case 3:
                            score += "Forty";
                            break;
                    }
                }
            }
            return score;
        }
    }
}
