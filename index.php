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
                initialDate: "2022-02-13",
                locale: 'ja',

                events: [{
                        title: 'カラオケ',
                        start: '2020-12-03'
                    },
                    {
                        title: 'ショッピング',
                        start: '2020-12-03'
                    },
                    {
                        title: '打ち合わせ',
                        start: '2020-12-07T10:00:00',
                        end: '2020-12-07T11:00:00'
                    },
                    {
                        title: '打ち上げ',
                        start: '2020-12-09T19:00:00'
                    },
                    {
                        title: '会議',
                        start: '2020-12-14T11:00:00',
                        constraint: 'availableForMeeting'
                    },
                    {
                        title: '打ち合わせ',
                        start: '2020-12-14T13:00:00',
                        end: '2020-12-14T13:30:00'
                    },
                    {
                        title: '打ち合わせ',
                        start: '2020-12-14T15:00:00',
                        end: '2020-12-14T15:30:00'
                    },
                    {
                        title: '打ち合わせ',
                        start: '2020-12-14T16:30:00',
                        end: '2020-12-14T18:00:00'
                    },
                    {
                        title: 'セミナー',
                        start: '2020-12-18T15:00:00',
                        end: '2020-12-18T17:30:00'
                    },
                    {
                        title: 'パーティー',
                        start: '2020-12-23T20:00:00'
                    },
                    {
                        title: '旅行',
                        start: '2020-12-26',
                        end: '2020-12-31'
                    }
                ],
                eventClick: (e) => { // イベントのクリックイベント
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