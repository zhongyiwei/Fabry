<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete the event that starts on the ' . $this->Form->value('Event.start') . '?', $this->Form->value('Event.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
    </ul>
</div>
<?php echo $this->Session->flash(); ?>
<div class="events form">
    <?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Edit Event'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title');
        echo $this->Form->input('description');
        echo $this->Form->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
        echo $this->Form->input('allDay');
        ?>
        <!--        <h3>Invitation send to: </h3>-->
        <?php
//        debug($userName);
//        echo $this->Form->select('users', $userName, array(
//            'multiple' => 'checkbox'
//        ));
//        echo $this->Form->checkbox('users', array($userName));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Update')); ?>
</div>

<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker({dateFormat: 'dd-mm-yy'});
    $('#dateTimePickerEnd').datetimepicker({dateFormat: 'dd-mm-yy'});

    $(document).ready(function() {
        var formattedDate = new Date($('#dateTimePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

        var hour = formattedDate.getHours();
        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();

        if (hour.toString().length < 2) {
            hour = "0" + hour;
        }

        if (minute.toString().length < 2) {
            minute = "0" + minute;
        }

        if (d.toString().length < 2) {
            d = "0" + d;
        }

        if (m.toString().length < 2) {
            m = "0" + m;
        }


        $("#dateTimePickerStart").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);

        var formattedDate = new Date($('#dateTimePickerEnd').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

        var hour = formattedDate.getHours();
        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();

        if (hour.toString().length < 2) {
            hour = "0" + hour;
        }

        if (minute.toString().length < 2) {
            minute = "0" + minute;
        }

        if (d.toString().length < 2) {
            d = "0" + d;
        }

        if (m.toString().length < 2) {
            m = "0" + m;
        }

        $("#dateTimePickerEnd").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);
    });
</script>