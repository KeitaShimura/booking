<?php
require_once(__DIR__."/../config/db.php");
require_once(__DIR__."/../model/Booking.php");
require_once(__DIR__."/../controller/BookingController.php");

$obj = new BookingController();
$bookings = $obj->index();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - 予約情報一覧 - </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div style="text-align: center; margin-top:50px;">
        <a class="btn btn-primary" href="../index.php">カレンダー</a>
        <a class="btn btn-primary" href="add.php">登録</a>
    </div>
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">予約情報一覧</h1>

    <div style="text-align: center;" class="position-relative">
        <article>
            <?php if (isset($_SESSION['status'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['status'];
                    unset($_SESSION['status']); ?>
                </div>

            <?php endif; ?>
            <div class="table-responsive">
                <?php if ($bookings) : ?>
                    <table class="table" style="margin:30px auto; text-align: center; border-top: 1px solid lightgray; width:80%;">
                        <thead style="height: 50px;">
                            <tr>
                                <th style="font-weight: bold;">お名前</th>
                                <th style="font-weight: bold;">電話番号</th>
                                <th style="font-weight: bold;">郵便番号</th>
                                <th style="font-weight: bold;">住所</th>
                                <th style="font-weight: bold;">人数</th>
                                <th style="font-weight: bold;">開始日</th>
                                <th style="font-weight: bold;">終了日</th>
                                <th style="font-weight: bold;">備考</th>
                                <th style="font-weight: bold;">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking) : ?>

                                <tr id="tr<?php echo($booking['id']); ?>">
                                    <td style="vertical-align: middle;"><?php echo($booking['name']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['phone']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['post_code']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['address']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['member']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['start']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['end']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo($booking['memo']); ?></td>
                                    <td id="delete_button" style="vertical-align: middle;"><a class="btn btn-danger" onclick="deleteData(<?php echo($booking['id']); ?>)">削除</a></td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h3 class="fs-3" style="text-align: center; margin: 50px 0 0 0;">予約情報はありません</h3>
                <?php endif; ?>
            </div>
        </article>
    </div>
    <script>
        function deleteData(id) {
            var delete_url = "delete.php?id=" + id;
            var target = document.getElementById('delete_button');
            var tr = document.getElementById('tr' + id);

            var xhr = new XMLHttpRequest();

            xhr.open(
                "DELETE",
                delete_url,
            );
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    tr.remove();
                }
            }
        };
    </script>
</body>

</html>