<?php

class BookingController
{

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
            'name' => trim($name) . '様',
            'phone' => trim($phone),
            'post_code' => trim($post_code),
            'address' => trim($address),
            'member' => trim($member),
            'start' => trim($start),
            'end' => trim($end),
            'memo' => trim($memo),
        ];

        $this->model->add($data);

        $_SESSION['status'] = "予約しました。";
        return header("Location: ../view/bookings.php");
    }

    public function validation($data) {
        $error = array();

        $start_date = new DateTime($data['start']);
        $end_date = new DateTime($data['end']);

        if (empty($data['name'])) {
            $error[] = "名前を入力してください。";
        }

        if (!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $data['phone'])) {
            $error[] = "電話番号を正しい形式で入力してください。";
        }

        if (!preg_match("/^(([0-9]{3}-[0-9]{4})|([0-9]{7}))$/", $data['post_code'])) {
            $error[] = "郵便番号を半角数字7桁で入力してください。";
        }

        if (empty($data['address'])) {
            $error[] = "住所を入力してください。";
        }

        if (empty($data['member'])) {
            $error[] = "人数を入力してください。";
        }

        if (empty($data['start'])) {
            $error[] = "予約開始日を入力してください";
        }

        if ($end_date < $start_date) {
            $error[] = "予約終了日は予約開始日以降の日付を入力してください。";
        }

        if (empty($data['end'])) {
            $error[] = "予約終了日を入力してください。";
        }

        return $error;
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }
}
