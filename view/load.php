<?PHP
require_once "../config/db.php";
require_once "../model/Booking.php";
require_once "../controller/BookingController.php";
$obj = new BookingController();
$bookings = $obj->index();

foreach ($bookings as $booking) {
    $data[] = array(
        'id' => $booking['id'],
        'title' => $booking['name'],
        'start' => $booking['start'],
        'end' => $booking['end'],
    );
}

echo json_encode($data);