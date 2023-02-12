CREATE TABLE IF NOT EXISTS booking.bookings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20),
    phone VARCHAR(20),
    post_code INT(20),
    address VARCHAR(20),
    member INT(11),
    start VARCHAR(20),
    end VARCHAR(20),
    memo TEXT,
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO booking.bookings SET id=1, name="志村 啓太", phone="08010101010", post_code=4000000, address="東京都", member=10, start="2020-10-10", end="2020-10-10", memo="テスト", created_at="2020-10-10", updated_at="2020-10-10"