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
            'name' => trim($name).'様',
            'phone' => trim($phone),
            'post_code' => trim($post_code),
            'address' => trim($address),
            'member' => trim($member),
            'start' => trim($start),
            'end' => trim($end),
            'memo' => trim($memo),
        ];

        $start_date = new DateTime($_POST['start']);
        $end_date = new DateTime($_POST['end']);

        if (empty($_POST['name'])) {
            $_SESSION['status'] = "名前を入力してください。";
            return header("Location: add.php");

        } else if (!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $_POST['phone'])) {
            $_SESSION['status'] = "電話番号を正しい形式で入力してください。";
            return header("Location: add.php");

        } else if (!preg_match("/^(([0-9]{3}-[0-9]{4})|([0-9]{7}))$/", $_POST['post_code'])) {
            $_SESSION['status'] = "郵便番号を半角数字7桁で入力してください。";
            return header("Location: add.php");

        } else if (empty($_POST['address'])) {
            $_SESSION['status'] = "住所を入力してください。";
            return header("Location: add.php");

        } else if (empty($_POST['member'])) {
            $_SESSION['status'] = "人数を入力してください。";
            return header("Location: add.php");

        } else if (empty($_POST['start'])) {
            $_SESSION['status'] = "予約開始日を入力してください";
            return header("Location: add.php");

        } else if ($end_date < $start_date) {
            $_SESSION['status'] = "予約終了日は予約開始日以降の日付を入力してください。";
            return header("Location: add.php");

        } else if (empty($_POST['end'])){
            $_SESSION['status'] = "予約終了日を入力してください。";
            return header("Location: add.php", true, 307);

        } else {
            $this->model->add($data);

        $_SESSION['status'] = "予約しました。";
        return header("Location: ../view/bookings.php");
        }
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        // $_SESSION['status'] = "予約を削除しました。";
        // return header("Location: ../view/bookings.php");
    }
}
