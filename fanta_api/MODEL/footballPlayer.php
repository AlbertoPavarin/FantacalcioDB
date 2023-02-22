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
}
?>