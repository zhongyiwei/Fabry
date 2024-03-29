<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php
            $date = $this->request->data['Exercise']['date'];
            $this->request->data['Exercise']['date'] = date('Y-m-d', strtotime($date));
            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete your exercise entry on ' . date('d-m-Y', strtotime($this->Form->value('Exercise.date'))) . '?'));
            ?></li>

        <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
    </ul>
</div>

<div class="exercises form">
    <?php echo $this->Form2->create('Exercise', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Edit Exercise Entry'); ?></legend>
        <?php
        echo $this->Form2->input('id');
//        echo $this->Form2->input('date', array('dateFormat' => 'DMY'));
        echo $this->Form2->input('Exercise.date', array('id' => 'datePickerStart', 'type' => 'text'));

        echo $this->Form2->input('durationMinute');
        echo $this->Form2->input('exercise_type');
        echo $this->Form2->input('comment');
        ?>
    </fieldset>
    <?php echo $this->Form2->end(__('Submit')); ?>
</div>
<script type="text/javascript">
    $('#datePickerStart').datepicker({dateFormat: 'dd-mm-yy'});
    $('#datePickerEnd').datepicker({dateFormat: 'dd-mm-yy'});

    function changeContent() {
        if ($('#checkbox').prop('checked')) {
            $('#datePickerEnd').hide();
        } else {
            $('#datePickerEnd').show();
        }
    }
    ;

    $(document).ready(function() {
        var formattedDate = new Date($('#datePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

//        var hour = formattedDate.getHours();
//        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();
        if (d.toString().length < 2) {
            d = "0" + d;
        }
        if (m.toString().length < 2) {
            m = "0" + m;
        }

//        if (hour.toString().length < 2) {
//            hour = "0" + hour;
//        }
//
//        if (minute.toString().length < 2) {
//            minute = "0" + minute;
//        }

//        $("#datePickerStart").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);
        $("#datePickerStart").val(d + "-" + m + "-" + y);

//        var formattedDate = new Date($('#datePickerEnd').val());
//        var d = formattedDate.getDate();
//        var m = formattedDate.getMonth();
//        m += 1;  // JavaScript months are 0-11
//
//        var hour = formattedDate.getHours();
//        var minute = formattedDate.getMinutes();
//
//        var y = formattedDate.getFullYear();

//        if (hour.toString().length < 2) {
//            hour = "0" + hour;
//        }
//
//        if (minute.toString().length < 2) {
//            minute = "0" + minute;
//        }

//        $("#datePickerEnd").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);

    });
</script>