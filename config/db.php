<?php
session_start();

class db
{
    private $host = "127.0.0.1";
    private $dbname = "booking";
    private $user = "root";
    private $password = "";
    public function connection()
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
