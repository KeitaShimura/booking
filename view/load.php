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
        'phone' => $booking['phone'],
        'post_code' => $booking['post_code'],
        'address' => $booking['address'],
        'member' => $booking['member'],
        'start' => $booking['start'],
        'end' => $booking['end'],
        'memo' => $booking['memo'],
    );
}

echo json_encode($data);