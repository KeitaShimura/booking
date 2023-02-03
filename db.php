<?PHP
$dsn = 'mysql:dbname=booking;host=127.0.0.1;charset=utf8mb4';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);

    // // テーブルの作成
    // $sql = 'CREATE TABLE bookings (
    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(20),
    //     phone VARCHAR(20),
    //     post_code INT(20),
    //     address VARCHAR(20),
    //     member INT(11),
    //     start DATETIME,
    //     end DATETIME,
    //     memo TEXT,
    //     created_at DATETIME,
    //     updated_at DATETIME
    // )';

    // $pdo->query($sql);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }

    // $booking = $pdo->exec('INSERT INTO bookings SET id=1, name="志村 啓太", phone="08010101010", post_code=4000000, address="東京都", member=10, start="2020-10-10", end="2020-10-10", memo="テスト", created_at="2020-10-10", updated_at="2020-10-10"');


    echo $booking
?>