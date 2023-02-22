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
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public function setAvailableFootballPlayer($id)
    {
        $sql = "UPDATE football_player
                SET available = 1
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public function AddFootballPlayer($name, $surname, $team, $role, $status, $date_birth, $value)
    {
        $sql = "INSERT INTO football_player(name, surname, team, `role`, status, date_birth, value)
                VALUES (?, ?, ?, ?, ?, ?, ?);";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssiiisi', $name, $surname, $team, $role, $status, $date_birth, $value);
        return $stmt->execute();
    }

    public function setFootballPlayerStatus($id, $status)
    {
        $sql = "UPDATE football_player
                SET status = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $status, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}
?>