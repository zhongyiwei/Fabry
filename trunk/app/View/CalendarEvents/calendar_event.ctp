<?php
echo $this->Html->css('fullcalendar.css');
echo $this->Html->script('fullcalendar.js');
//debug($eventData);
//debug($appointmentData);
//debug($contactId);
//debug($invitationData);
?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Html->link(__('New Calendar Event'), array('action' => 'add')); ?>
<?php
echo nl2br(" \n ");
?>
<?php echo $this->Html->link(__('New Appoinment Event'), array('controller' => 'appointments', 'action' => 'add?redirect=calendar')); ?>
<?php
echo $this->Html->image("legend.png", array("alt" => "Calendar Legend", 'name' => "Calendar Legend", 'height' => "110", 'style' => "float:right;margin-top: -25px;margin-bottom: 15px;"));
?>
<div id='calendar' style='margin:3em 0;font-size:13px'></div> 
<script type="text/javascript">
    $(document).ready(function() {
        var source = new Array();
        source [0] = [
<?php
echo $calendarEvent;
?>
        ];
        source [1] = [
<?php
echo $appointmentEvent;
?>
        ];
        source [2] = [
<?php
echo $eventGoingAttend;
?>
        ];
        source [3] = [
<?php
echo $medicationEvent;
?>
        ];
        //        var date = new Date();
        //        var d = date.getDate();
        //        var m = date.getMonth();
        //        var y = date.getFullYear();
        $('#calendar').fullCalendar({
            //            eventClick: function(calEvent, jsEvent) {
            //                var title = prompt('Event Title:', calEvent.title, {
            //                    buttons: {
            //                        Ok: true,
            //                        Cancel: false
            //                    }
            //                });
            //                if (title) {
            //                    calEvent.title = title;
            //                    $('#calendar').fullCalendar('updateEvent', calEvent);
            //                }
            //            },
            dayClick: function(date, allDay, jsEvent, view) {
                var curr_date = date.getDate();
                var curr_month = date.getMonth() + 1; //Months are zero based
                var curr_year = date.getFullYear();
                var finalDate = curr_year + "-" + curr_month + "-" + curr_date;

                window.location = <?php echo "'" . $this->webroot . "calendarEvents/add?date='" ?> + finalDate;

            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventSources: [
                {
                    events: source[0],
                    backgroundColor: '#538DD9'
                },
                {
                    events: source[1],
                    backgroundColor: '#87A630'
                },
                {
                    events: source[2],
                    backgroundColor: '#B82832'
                },
                {
                    events: source[3],
                    backgroundColor: '#FF9F21'
                }
//                { title: 'All Day Event',start: new Date(y, m, 1)},
//                {
//                    title: 'Long Event',
//                    start: new Date(y, m, d - 5),
//                    end: new Date(y, m, d - 2)},
//                {
//                    id: 999,
//                    title: 'Repeating Event',
//                    start: new Date(y, m, d - 3, 16, 0),
//                    allDay: false},
//                {
//                    id: 999,
//                    title: 'Repeating Event',
//                    start: new Date(y, m, d + 4, 16, 0),
//                    allDay: false},
//                {
//                    title: 'Meeting',
//                    start: new Date(y, m, d, 10, 30),
//                    allDay: false},
//                {
//                    title: 'Lunch',
//                    start: new Date(y, m, d, 12, 0),
//                    end: new Date(y, m, d, 14, 0),
//                    allDay: false},
//                {
//                    title: 'Birthday Party',
//                    start: new Date(y, m, d + 1, 19, 0),
//                    end: new Date(y, m, d + 1, 22, 30),
//                    allDay: false},
//                {
//                    title: 'Click for Google',
//                    start: new Date(y, m, 28),
//                    end: new Date(y, m, 29),
//                    url: 'http://google.com/'}
            ]

        });
    });
</script>
