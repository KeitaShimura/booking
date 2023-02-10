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
            const buttonClose = document.getElementsByClassName('modal-close')[0];
            const name = document.getElementById('name')[0];
            const phone = document.getElementsByClassName('name');
            const post_code = document.getElementById('post_code')[0];
            const address = document.getElementById('address')[0];
            const member = document.getElementById('member')[0];
            const start = document.getElementById('start')[0];
            const end = document.getElementById('end')[0];
            const memo = document.getElementById('memo')[0];

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ja',
                events: 'view/load.php',
                eventClick: (e) => {
                    var id = e.event.id;
                    // alert(e.evegnt.descripcion);
                    phone.textContent = "e.event.text";
                    
                    
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
        <a class="btn btn-success" href="view/add.php">登録</a>
        <a class="btn btn-success" href="view/bookings.php">予約情報一覧</a>
    </div>

    <div id='calendar'></div>


    
    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="name"></h5>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close" id="modal-close">X</button>
                </div>
                <div class="modal-body">
                    <p class="name"></p>
                    <p id="post_code"></p>
                    <p id="address"></p>
                    <p id="member"></p>
                    <p id="start"></p>
                    <p id="end"></p>
                    <p id="memo"></p>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>