<?php
class FootballPlayer
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getFootballPayer($id)
    {
        $sql = "SELECT * FROM football_player WHERE id = " . $this->conn->real_escape_string($id) . ";";

        return $this->conn->query($sql);
    }

    public function getArchiveFooballPlayers()
    {
        $sql = "SELECT * FROM football_player";

        return $this->conn->query($sql);
    }

    public function getAvailableFooballPlayers()
    {
        $sql = "SELECT * FROM football_player WHERE available = 1";

        return $this->conn->query($sql);
    }

    public function setUnavailableFootballPlayer($id)
    {
        $sql = "UPDATE football_player
                SET available = 0
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>