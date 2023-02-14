<?php
require_once(__DIR__."/../config/db.php");
require_once(__DIR__."/../model/Booking.php");
require_once(__DIR__."/../controller/BookingController.php");


$token = filter_input(INPUT_POST, 'token');
if (empty($_SESSION['token']) || $token !== $_SESSION['token']) {
    die('投稿失敗');
} else {
    $obj = new bookingController();
    $obj->add();
}