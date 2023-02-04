<?PHP
require "db.php";

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $bookings = $pdo->prepare('DELETE FROM bookings WHERE id=?');
    $bookings->execute(array($id));

    header('Location: http://localhost/booking/bookings.php');
}
?>