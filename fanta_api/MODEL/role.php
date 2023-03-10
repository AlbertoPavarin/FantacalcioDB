<?php
class Role
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getRole($id)
    {
        $sql = "SELECT * from `role` WHERE id = " . $this->conn->real_escape_string($id) . "";

        return $this->conn->query($sql);
    }

    public function getArchiveRoles()
    {
        $sql = "SELECT * from `role`";

        return $this->conn->query($sql);
    }

    public function addRole($desc)
    {
        $sql = "INSERT INTO `role`(description)
                VALUES (?);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $desc);
        return $stmt->execute();
    }
}
?>