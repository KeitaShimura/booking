
<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: "2022-02-13",
                events: "get.php",
                dateClick: (e) => { // 日付マスのクリックイベント
                    console.log("dateClick:", e);
                },
                eventClick: (e) => { // イベントのクリックイベント
                    console.log("eventClick:", e.event.title);
                }
            });
            calendar.render();
        });
    </script>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>