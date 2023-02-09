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

        $PDO->exec('INSERT INTO bookings SET id=1, name="志村 啓太", phone="08010101010", post_code=4000000, address="東京都", member=10, start="2020-10-10", end="2020-10-10", memo="テスト", created_at="2020-10-10", updated_at="2020-10-10"');

    }
}
