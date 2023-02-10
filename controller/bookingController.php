<?php

class BookingController {

    private $model;
    public function __construct()
    {
        $this->model = new Booking();
    }

    public function index()
    {
        return $this->model->index();
    }

    public function add()
    {
        $data = [
            'name' => trim($_POST['name']),
            'phone' => trim($_POST['phone']),
            'post_code' => trim($_POST['post_code']),
            'address' => trim($_POST['address']),
            'member' => trim($_POST['member']),
            'start' => trim($_POST['start']),
            'end' => trim($_POST['end']),
            'memo' => trim($_POST['memo']),
        ];

        $this->model->add($data);
        // $_SESSION['status'] = "TODOを作成しました。";
        // return header("Location: ../index.php");
    }
}