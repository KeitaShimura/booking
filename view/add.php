<?php

require_once "../config/db.php";
require_once "../model/Booking.php";
require_once "../controller/BookingController.php";

$obj = new BookingController();
$bookings = $obj->index();

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
        <?php if (isset($_SESSION['status'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['status'];
                    unset($_SESSION['status']); ?>
                </div>

            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">お名前</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $_SESSION['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">電話番号</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">郵便番号</label>
                <input type="text" class="form-control" id="post_code" name="post_code" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">住所</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">人数</label>
                <input type="number" min="1"class="form-control" id="member" name="member" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">日付</label>
                <input type="date" class="form-control" id="start" name="start" placeholder="">
                <input type="date" class="form-control" id="end" name="end" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">備考</label>
                <textarea class="form-control" id="memo" name="memo" rows="3"></textarea>
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