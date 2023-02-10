<?php
require_once "../config/db.php";
require_once "../model/Booking.php";
require_once "../controller/BookingController.php";

$obj = new BookingController();
$obj->delete($_GET['id']);
