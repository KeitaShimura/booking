<?PHP
require_once "../config/db.php";
require_once "../model/Booking.php";
require_once "../controller/BookingController.php";

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
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">予約情報一覧</h1>
    <div style="text-align: center;" class="position-relative">
        <article>
                <div class="table-responsive">
                <?php if ($bookings) : ?>
                    <table class="table" style="margin:30px auto; text-align: center; border-top: 1px solid lightgray; width:80%;">
                        <thead style="height: 50px;">
                            <tr>
                                <th class="" style="font-weight: bold;">お名前</th>
                                <th class="" style="font-weight: bold;">電話番号</th>
                                <th class="" style="font-weight: bold;">郵便番号</th>
                                <th class="" style="font-weight: bold;">住所</th>
                                <th class="" style="font-weight: bold;">人数</th>
                                <th class="" style="font-weight: bold;">開始日</th>
                                <th class="" style="font-weight: bold;">終了日</th>
                                <th class="" style="font-weight: bold;">備考</th>
                                <th class="" style="font-weight: bold;">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bookings as $booking) : ?>

                                <tr>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['name']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['phone']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['post_code']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['address']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['member']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['start']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['end']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($booking['memo']); ?></td>
                                    <td id="delete_button" class="col-3" style="vertical-align: middle;"><a class="btn btn-danger" onclick="deleteData(<?php print($booking['id']); ?>)">削除</a></td>
                                </tr>

                                <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <h3 class="fs-3" style="text-align: center; margin: 50px 0 0 0;">TODOはありません</h3>
                <?php endif; ?>
                </div>
        </article>
    </div>
    <script>
        function deleteData(id) {
            var delete_url = "delete.php?id=" + id;
            var target = document.getElementById('delete_button');
            var parent = target.parentNode;

            var xhr = new XMLHttpRequest();

            xhr.open(
                "DELETE",
                delete_url,
                id
            );
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    parent.remove();
                }
            }
        };
    </script>
</body>

</html>