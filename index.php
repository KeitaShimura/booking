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

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ja',
                events: 'view/load.php',
                eventClick: (e) => {
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

    <div id='calendar'></div>


    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close" id="modal-close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

</html>