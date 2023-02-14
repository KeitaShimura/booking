<?php
require_once(__DIR__."/../config/db.php");
require_once(__DIR__."/../model/Booking.php");
require_once(__DIR__."/../controller/BookingController.php");

$obj = new BookingController();
$obj->delete($_GET['id']);
