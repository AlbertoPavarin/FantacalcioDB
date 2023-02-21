<?php
class User
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createUser($email, $psw, $username)
    {
        $sql = "INSERT INTO `user` (email, `password`, username)
                VALUES (?, ?, ?);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $email, hash("sha256", $psw), $username);
        return $stmt->execute();
    }

    public function login($email, $psw)
    {
        $sql = sprintf("SELECT id FROM `user` WHERE email = '%s' AND password = '%s';",
        $this->conn->real_escape_string($email), $this->conn->real_escape_string(hash("sha256", $psw)));

        return $this->conn->query($sql);
    }

    public function getUser($id)
    {
        $sql = "SELECT id, email, username FROM `user` WHERE id = ". $this->conn->real_escape_string($id) .";";

        return $this->conn->query($sql);
    }

    public function getArchiveUsers()
    {
        $sql = "SELECT id, email, username FROM `user`";

        return $this->conn->query($sql);
    }

    public function getActiveUsers()
    {
        $sql = "SELECT id, email, username FROM `user` WHERE active = 1";

        return $this->conn->query($sql);
    }
}
?>