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

    public function store()
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

        $error = [];

        $start_date = new DateTime($_POST['start']);
        $end_date = new DateTime($_POST['end']);

        if (mb_strlen($_POST['name']) > 30) {
            $error[] = "お名前を30文字以内で入力してください。";
        }

        if (!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $_POST['phone'])) {
            $error[] = "電話番号を正しい形式で入力してください。";
        }

        if (!preg_match("/^(([0-9]{3}-[0-9]{4})|([0-9]{7}))$/", $_POST['post_code'])) {
            $error[] = "郵便番号を正しい形式で入力してください。";
        }

        if (mb_strlen($_POST['address']) > 30) {
            $error[] = "住所を30文字以内で入力してください。";
        }

        if ($end_date < $start_date) {
            $error[] = "予約終了日は予約開始日以降の日付を入力してください。";
        }

        if (mb_strlen($_POST['memo']) > 100) {
            $error[] = "メモを100文字以内で入力してください。";
        }

        if (count($error) > 0) {
            $_SESSION['status'] = $error;
            return header("Location: add.php", true, 307);
            // exit;
        } else {
            unset($_SESSION['status']);
            $this->model->store($data);

            $_SESSION['status'] = "予約しました。";
            return header("Location: ../view/bookings.php");
        }
    }

    function checkCharCount(string $str, int $count): bool {
        return  mb_strlen($str) <= $count;
      }

    public function delete($id)
    {
        $this->model->delete($id);
    }
}
