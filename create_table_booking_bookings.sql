CREATE TABLE IF NOT EXISTS booking.bookings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(32) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    post_code VARCHAR(10) NOT NULL,
    address VARCHAR(32) NOT NULL,
    member VARCHAR(5) NOT NULL,
    start DATE,
    end DATE,
    memo TEXT,
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO booking.bookings SET id=1, name="志村 啓太", phone="08010101010", post_code=4000000, address="東京都", member=10, start="2020-10-10", end="2020-10-10", memo="テスト", created_at="2020-10-10", updated_at="2020-10-10";
INSERT INTO booking.bookings SET id=2, name="aa", phone="11111111111", post_code=1111111, address="山梨県", member=1, start="2022-10-11", end="2022-11-11", memo="テスト", created_at="2022-10-10", updated_at="2022-10-10";
INSERT INTO booking.bookings SET id=3, name="bb", phone="22222222222", post_code=2222222, address="神奈川県", member=12, start="2022-10-14", end="2022-12-11", memo="テスト", created_at="2022-09-10", updated_at="2022-10-11";
INSERT INTO booking.bookings SET id=4, name="cc", phone="33333333333", post_code=3333333, address="千葉県", member=3, start="2022-10-15", end="2022-12-13", memo="テスト", created_at="2022-10-10", updated_at="2022-10-12";