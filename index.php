<?php
require_once "config/db.php";
require_once "model/Booking.php";
require_once "controller/BookingController.php";

$obj = new BookingController();
$booking = $obj->show($_GET['id']);

?>

<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const buttonClose = document.getElementsByClassName('btn-close')[0];

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ja',
                events: 'view/load.php',
                eventClick: (e) => {
                    var name = e.event.title;
                    var phone = e.event.extendedProps.phone;
                    var post_code = e.event.extendedProps.post_code;
                    var address = e.event.extendedProps.address;
                    var member = e.event.extendedProps.member;
                    var start = e.event.start;
                    var end = e.event.end;
                    var memo = e.event.extendedProps.memo;

                    let format_start = start.getFullYear() + "-" + start.getMonth() + "-" + start.getDate();
                    let format_end = end.getFullYear() + "-" + end.getMonth() + "-" + end.getDate();

                    const title_id = document.getElementById('name');
                    const phone_id = document.getElementById('phone');
                    const post_code_id = document.getElementById('post_code');
                    const address_id = document.getElementById('address');
                    const member_id = document.getElementById('member');
                    const start_id = document.getElementById('start');
                    const end_id = document.getElementById('end');
                    const memo_id = document.getElementById('memo');

                    title_id.textContent = name;
                    phone_id.textContent = phone;
                    post_code_id.textContent = post_code;
                    address_id.textContent = address;
                    member_id.textContent = member;
                    start_id.textContent = format_start;
                    end_id.textContent = format_end;
                    memo_id.textContent = memo;

                    modal.style.display = 'block';
                },
            });
            calendar.render();

            buttonClose.addEventListener('click', modalClose);

            function modalClose() {
                modal.style.display = 'none';
            }

            addEventListener('click', outsideClose);

            function outsideClose(e) {
                if (e.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</head>

<body>
    <div class="button" style="text-align: right; margin:10px;">
        <a class="btn btn-primary" href="view/add.php">登録</a>
        <a class="btn btn-primary" href="view/bookings.php">予約情報一覧</a>
    </div>

    <div id='calendar'></div>

    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="name"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>電話番号：<span id="phone"></span></p>
                    <p>郵便番号：<span id="post_code"></span></p>
                    <p>住所：<span id="address"></span></p>
                    <p>人数：<span id="member"></span></p>
                    <p>開始日：<span id="start"></span></p>
                    <p>終了日：<span id="end"></span></p>
                    <p>メモ：<span id="memo"></span></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>