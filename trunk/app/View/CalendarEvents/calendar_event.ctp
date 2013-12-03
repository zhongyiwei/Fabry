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
<?php echo $this->Html->link(__('New Appoinment Event'), array('controller' => 'appointments', 'action' => 'add')); ?>
<?php
echo $this->Html->image("legend.png", array("alt" => "Calendar Legend", 'name' => "Calendar Legend", 'height' => "110", 'style' => "float:right;margin-top: -25px;margin-bottom: 15px;"));
?>
<div id='calendar' style='margin:3em 0;font-size:13px'></div> 
<script type="text/javascript">
    $(document).ready(function() {
        var source = new Array();
        source [0] = [
<?php
for ($i = 0; $i < count($eventData); $i++) {
    $status = ($eventData[$i]['CalendarEvent']['allDay'] == 1 ? "true" : "false");
    if ($eventData[$i]['CalendarEvent']['repeat'] == 0) {
        echo "\n{\n";
        echo "title:'" . $eventData[$i]['CalendarEvent']['title'] . "',\n";
        echo "start:'" . $eventData[$i]['CalendarEvent']['start'] . "',\n";
        echo "end:'" . $eventData[$i]['CalendarEvent']['end'] . "',\n";
        echo "allDay:" . $status . ",\n";
        echo "url:'" . $this->webroot . "calendarEvents/edit/" . $eventData[$i]['CalendarEvent']['id'] . "'";
        if ($i != (count($eventData) - 1)) {
            echo "\n},\n";
        } else {
            echo "\n}\n";
        }
    } else {
        $repeatingWeeks = 54;
        for ($j = 0; $j < $repeatingWeeks; $j++) {
            $newStartDate = date('Y-m-d h:i:s', strtotime($eventData[$i]['CalendarEvent']['start']) + 7 * 24 * 3600 * $j);
            $newEndDate = date('Y-m-d h:i:s', strtotime($eventData[$i]['CalendarEvent']['end']) + 7 * 24 * 3600 * $j);
            echo "\n{\n";
            echo "title:'" . $eventData[$i]['CalendarEvent']['title'] . "',\n";
            echo "start:'" . $newStartDate . "',\n";
            echo "end:'" . $newEndDate . "',\n";
            echo "allDay:" . $status . ",\n";
            echo "url:'" . $this->webroot . "calendarEvents/edit/" . $eventData[$i]['CalendarEvent']['id'] . "'";
//            if ($i != ($repeatingWeeks - 1)) {
            echo "\n},\n";
//            } else {
//                echo "\n}\n";
//            }
        }
    }
}
?>
        ];
        source [1] = [
<?php
for ($j = 0; $j < count($appointmentData); $j++) {
    echo "\n{\n";
    echo "title:'" . $appointmentData[$j]['Appointment']['description'] . "',\n";
    echo "start:'" . $appointmentData[$j]['Appointment']['date'] . "',\n";
    echo "allDay:false,\n";
    echo "url:'" . $this->webroot . "appointments/edit/" . $appointmentData[$j]['Appointment']['id'] . "'";
//    if ($j != (count($appointmentData) - 1)) {
    echo "\n},\n";
//    } else {
//        echo "\n}\n";
//    }
}
//    $eventVariable['title'] = $eventData[$i]['CalendarEvent']['title'];
//    $eventVariable['start'] = $eventData[$i]['CalendarEvent']['start'];
//    $eventVariable['end'] = $eventData[$i]['CalendarEvent']['end'];
//    $eventVariable['allDay'] = ($eventData[$i]['CalendarEvent']['start'] == 0 ? true : false);
//
//    echo json_encode($eventVariable);
?>
        ];
        source [2] = [
<?php
for ($p = 0; $p < count($invitationData); $p++) {
    $InviteAllDayStatus = ($invitationData[$p]['Events']['allDay'] == 1 ? "true" : "false");

    echo "\n{\n";
    echo "title:'" . $invitationData[$p]['Events']['title'] . "',\n";
    echo "start:'" . $invitationData[$p]['Events']['start'] . "',\n";
    echo "end:'" . $invitationData[$p]['Events']['end'] . "',\n";
    echo "allDay:" . $InviteAllDayStatus . ",\n";
//    echo "url:'" . $this->webroot . "invitation/edit/" . $invitationData[$p]['Appointment']['id'] . "'";
    if ($p != (count($invitationData) - 1)) {
        echo "\n},\n";
    } else {
        echo "\n}\n";
    }
}
//    $eventVariable['title'] = $eventData[$i]['CalendarEvent']['title'];
//    $eventVariable['start'] = $eventData[$i]['CalendarEvent']['start'];
//    $eventVariable['end'] = $eventData[$i]['CalendarEvent']['end'];
//    $eventVariable['allDay'] = ($eventData[$i]['CalendarEvent']['start'] == 0 ? true : false);
//
//    echo json_encode($eventVariable);
?>
        ];
        source [3] = [
<?php
for ($q = 0; $q < count($medicationData); $q++) {
    $repeatingTimes = $medicationData[$q]['Medication']['repeatTimes'];
    
    $repeatingHours = $medicationData[$q]['Medication']['frequency'];
    if ($repeatingHours == "Daily"){
        $repeatingHours = 24;
    }else if ($repeatingHours == "Once in two days"){
        $repeatingHours = 48;
    }else if ($repeatingHours == "Once in three days"){
        $repeatingHours = 72;
    }else if ($repeatingHours == "Weekly"){
        $repeatingHours = 168;
    }
    for ($j = 0; $j < $repeatingTimes; $j++) {
        $newStartDate = date('Y-m-d h:i:s', strtotime($medicationData[$q]['Medication']['start']) + $repeatingHours * 3600 * $j);
        
        echo "\n{\n";
        echo "title:' Take " . $medicationData[$q]['Medication']['medicationName'] . "',\n";
        echo "start:'" . $newStartDate . "',\n";
        echo "allDay:false,\n";
        echo "url:'" . $this->webroot . "medications/edit/" . $medicationData[$q]['Medication']['id'] . "'";
//        if ($q != (count($medicationData) - 1)) {
            echo "\n},\n";
//        } else {
//            echo "\n}\n";
//        }
    }
}
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
