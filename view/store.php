<?php
require_once "../config/db.php";
require_once "../model/Booking.php";
require_once "../controller/BookingController.php";

$obj = new bookingController();
    $obj->add();
// $token = filter_input(INPUT_POST, 'token');
// if (empty($_SESSION['token']) || $token !== $_SESSION['token']) {
//     die('投稿失敗');
// } else {
//     $obj = new bookingController();
//     $obj->add();
// }
