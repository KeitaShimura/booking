<?PHP
require "db.php";

$bookings = $pdo->query('SELECT * FROM bookings');

?>
