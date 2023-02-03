<?PHP
require "db.php";

$bookings = $pdo->query('SELECT * FROM bookings');
while($booking = $bookings->fetch()) {
    print($booking['name']);
}
?>