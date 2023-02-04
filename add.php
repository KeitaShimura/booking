<?php
require "db.php";

$bookings = $pdo->prepare('INSERT INTO bookings SET name=?, phone=?, post_code=?, address=?, member=?, start=?, end=?, memo=?, created_at=NOW()');
$bookings->execute(array($_POST['name'], $_POST['phone'], $_POST['post_code'], $_POST['address'], $_POST['member'], $_POST['start'], $_POST['end'], $_POST['memo']));

header('Location: http://localhost/booking/bookings.php');
?>