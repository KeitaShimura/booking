<?php

class booking {
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function store($content)
    {
        $statement = $this->PDO->prepare("INSERT INTO posts SET name= :name, phone= :phone, post_code= = :post_code, address= = :address, member= = :member, start= = :start, end= = :end, memo = :memo, created_at=NOW(), updated_at=NOW()");
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        $statement->bindParam(":content", $content);
        
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
}