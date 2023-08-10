<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script>
        var events = [
                { // this object will be "parsed" into an Event Object
                    title: 'The Title', // a property!
                    start: '2023-08-09', // a property!
                    end: '2023-08-10' // a property! ** see important note below about 'end' **
                }
            ];
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            editable: true,
            initialView: 'dayGridMonth',
            selectable: true,
			selectHelper: true,
            events: events,
            eventClick: function(info) {
                console.log(info.event.title);                // change the border color just for fun
                info.el.style.borderColor = 'red';
            },
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    console.log(start.startStr);
                    console.log(start.endStr);
                    calendar.addEvent({
                        title: title,
                        start: start.startStr,
                        end: end,
                        allDay: allDay
                    });
                }
            },
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>