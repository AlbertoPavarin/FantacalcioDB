<?php
class Status
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getStatus($id)
    {
        $sql = "SELECT * from status WHERE id = " . $this->conn->real_escape_string($id) . "";

        return $this->conn->query($sql);
    }

    public function getArchiveStates()
    {
        $sql = "SELECT * from status";

        return $this->conn->query($sql);
    }

    public function addStatus($desc)
    {
        $sql = "INSERT INTO status(description)
                VALUES (?);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $desc);
        return $stmt->execute();
    }
}
?>