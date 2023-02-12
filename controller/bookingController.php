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

        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
        $phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES);
        $post_code = htmlspecialchars(trim($_POST['post_code']), ENT_QUOTES);
        $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES);
        $member = htmlspecialchars(trim($_POST['member']), ENT_QUOTES);
        $start = htmlspecialchars(trim($_POST['start']), ENT_QUOTES);
        $end = htmlspecialchars(trim($_POST['end']), ENT_QUOTES);
        $memo = htmlspecialchars(trim($_POST['memo']), ENT_QUOTES);

        $data = [
            'name' => trim($name),
            'phone' => trim($phone),
            'post_code' => trim($post_code),
            'address' => trim($address),
            'member' => trim($member),
            'start' => trim($start),
            'end' => trim($end),
            'memo' => trim($memo),
        ];

        $this->model->add($data);
        // $_SESSION['status'] = "TODOを作成しました。";
        return header("Location: ../view/bookings.php");
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function delete($id)
    {
        // $_SESSION['status'] = "TODOを削除しました。";
        $this->model->delete($id);
        return header("Location: ../view/bookings.php");
    }
}