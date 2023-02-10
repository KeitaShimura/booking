<?php

class Booking
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM bookings");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function add($data)
    {
        $statement = $this->PDO->prepare("INSERT INTO bookings (name, phone, post_code, address, member, start, end, memo, created_at, updated_at) VALUES(:name, :phone, :post_code, :address, :member, :start, :end, :memo, NOW(), NOW())");
        $statement->bindParam(":name", $data['name']);
        $statement->bindParam(":phone", $data['phone']);
        $statement->bindParam(":post_code", $data['post_code']);
        $statement->bindParam(":address", $data['address']);
        $statement->bindParam(":member", $data['member']);
        $statement->bindParam(":start", $data['start']);
        $statement->bindParam(":end", $data['end']);
        $statement->bindParam(":memo", $data['memo']);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
