<?php

require_once(__DIR__ . "/../config/db.php");
require_once(__DIR__ . "/../model/Booking.php");
require_once(__DIR__ . "/../controller/BookingController.php");

$obj = new BookingController();
$booking = $obj->index();

session_start();

$token = bin2hex(openssl_random_pseudo_bytes(24));
$_SESSION['token'] = $token;


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - 登録 - </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div style="margin:0 auto; max-width: 1000px;">
        <div style="text-align: center; margin-top:50px;">
            <a class="btn btn-primary" href="../index.php">カレンダー</a>
            <a class="btn btn-primary" href="bookings.php">予約情報一覧</a>
        </div>

        <form name="contact" method="post" action="store.php" style="margin:50px 100px 0 100px;">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_COMPAT, 'UTF-8'); ?>">
            <?php foreach ($_SESSION['status'] as $error) : ?>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error;
                        unset($_SESSION['status']); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">お名前</label>
                <input required type="text" maxlength="100" class="form-control" name="name" value="<?php echo $_POST['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">電話番号 （例: 080-0000-0000 / 08011112222）</label>
                <input required type="tel" maxlength="100" class="form-control" id="phone" name="phone" value="<?php echo $_POST['phone'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">郵便番号 （例: 000-0000 / 1112222）</label>
                <input required type="text" maxlength="100" class="form-control" id="post_code" name="post_code" value="<?php echo $_POST['post_code'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">住所</label>
                <input required type="text" maxlength="100" class="form-control" id="address" name="address" value="<?php echo $_POST['address'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">人数</label>
                <input required type="number" min="1" class="form-control" id="member" name="member" value="<?php echo $_POST['member'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">日付</label>
                <input required type="date"  class="form-control" id="start" name="start" value="<?php echo $_POST['start'] ?>">
                <input required type="date" class="form-control" id="end" name="end" value="<?php echo $_POST['end'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">備考</label>
                <textarea class="form-control" maxlength="1000" id="memo" name="memo" rows="3"><?php echo $_POST['memo'] ?></textarea>
            </div>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success" value="送信">
                <input type="reset" class="btn btn-danger" value="リセット">
            </div>
        </form>
    </div>
    <script>
        const contactForm = document.forms.contact;
        contactForm.post_code.addEventListener('input', e => {
            fetch(`https://zipcloud.ibsnet.co.jp/api/search?zipcode=${e.target.value}`)
                .then(response => response.json())
                .then(data => {
                    console.log(e.target.value);
                    contactForm.address.value = data.results[0].address1 + data.results[0].address2 + data.results[0].address3;
                })
                .catch(error => console.log(error))
        })
    </script>
</body>

</html>