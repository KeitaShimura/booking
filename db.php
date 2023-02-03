<?PHP
$dsn = 'mysql:dbname=booking;host=127.0.0.1;charset=utf8mb4';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);

    $sql = 'CREATE TABLE bookings (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20),
        phone INT(11),
        post_code INT(11),
        address INT(11),
        member VARCHAR(20),
        start DATETIME,
        end DATETIME,
        memo TEXT,
        created_at DATETIME,
        updated_at DATETIME
    )';

    $pdo->query($sql);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
