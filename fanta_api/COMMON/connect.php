<?php
class Database
{
    //credentials localhost
    private $server = "localhost";
    private $user = "root";
    private $passwd = "";
    private $db = "fantacalcio_db";

    //common credentials
    private $port = "3306";
    public $conn;

    public function connect()
    {
        try
        {
            $this->conn = new mysqli($this->server, $this->user, $this->passwd, $this->db, $this->port);
        }
        catch (Exception $ex)
        {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
?>