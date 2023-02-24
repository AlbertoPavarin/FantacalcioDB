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
}
?>