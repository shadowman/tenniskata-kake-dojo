namespace TennisKata.Factored1
{
    public class TennisGame
    {
        public static readonly string[] POINTS = new string[] {"Love", "Fifteen", "Thirty", "Forty"};

        private int player2Score;
        private int player1Score;

        private string player1Name;
        private string player2Name;

        public TennisGame(string player1Name, string player2Name)
        {
            this.player1Name = player1Name;
            this.player2Name = player2Name;
        }

        public string GetScore()
        {
            if (SomeoneHasWon())
                return "Win for " + WinningPlayerName();

            if (IsEndgame())
            {
                if (PointsAreEven())
                    return "Deuce";
                else
                    return "Advantage " + WinningPlayerName();
            }
            else
            {
                if (PointsAreEven())
                    return POINTS[player1Score] + "-All";
                else
                {
                    return POINTS[player1Score] + "-" + POINTS[player2Score];
                }
            }
        }

        public bool SomeoneHasWon()
        {
            return IsEndgame() && (player1Score - player2Score >= 2 || player2Score - player1Score >= 2);
        }

        private bool PointsAreEven()
        {
            return player1Score == player2Score;
        }

        private bool IsEndgame()
        {
            return player1Score > 3 || player2Score > 3;
        }

        public string WinningPlayerName()
        {
            if (player1Score > player2Score)
                return player1Name;
            else
                return player2Name;
        }

        public void WonPoint(string playerName)
        {
            if (playerName == player1Name)
                this.player1Score += 1;
            else
                this.player2Score += 1;

        }
    }
}
