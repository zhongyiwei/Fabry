<?php
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.js');
echo $this->Html->script('fullcalendar.js');
echo $this->Html->script('jquery.ui.dialog.js');

echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('fullcalendar.css');
echo $this->Html->css('jquery.ui.dialog.css');

//debug($eventData);
//debug($appointmentData);
//debug($contactId);
//debug($invitationData);
?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Html->link(__('New Personal Event'), array('action' => 'add'), array('class' => 'cl')); ?>
<?php
echo nl2br(" \n ");
?>
<?php echo $this->Html->link(__('New Appoinment Event'), array('controller' => 'appointments', 'action' => 'add?redirect=calendar'), array('class' => 'cl')); ?>
<?php
echo $this->Html->image("legend.png", array("alt" => "Calendar Legend", 'name' => "Calendar Legend", 'height' => "110", 'style' => "float:right;margin-top: -25px;margin-bottom: 15px;"));
?>
<div id='calendar' style='margin:3em 0;font-size:13px'></div> 

<div id="dialog" style="display: none" title="Choose one: ">
    <p>Please choose which one you want to add:</p>
    <div  ><a class="cl" href="" id="toPersonal">Add Personal Calendar Event</a></div>
    <div ><a  class="cl" href="" id="toAppointment">Add Appointment</a></div>
    <?php
    if ($current_user['role'] == "admin") {
        echo '<div ><a  class="cl" href="" id="toEvent">Add Event</a></div>';
    }
    ?>
</div>
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
            disableDragging: true,
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

//                window.location = <?php // echo "'" . $this->webroot . "calendarEvents/add?date='"    ?> + finalDate;
                $("#dialog").dialog();
//                finalDate = $.trim(finalDate)
                $("#toPersonal").prop("href", "<?php echo $this->webroot . "calendarEvents/add?date=" ?>" + finalDate);
                $("#toAppointment").prop("href", "<?php echo $this->webroot . "appointments/add?redirect=calendar&date=" ?>" + finalDate);
<?php
if ($current_user['role'] == "admin") {
    $temp = '"' . $this->webroot . "events/add?date=" . '"';
    echo "$('#toEvent').prop('href',  $temp + finalDate);";
}
?>
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
            ],
            timeFormat: 'h(:mm)tt'
        });
    });


    function toCalendar()
    {
        window.location = <?php echo "'" . $this->webroot . "calendarEvents/add?date='" ?> + finalDate;
    }
</script>
