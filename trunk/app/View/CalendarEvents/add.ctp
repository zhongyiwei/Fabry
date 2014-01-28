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

        <li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>

    </ul>
</div>
<div class="calendarEvents form">
    <?php echo $this->Form2->create('CalendarEvent', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Add Personal Event'); ?></legend>
        <?php
        if (!empty($this->params['url']['date'])) {
            $date = $this->params['url']['date'];
        }
        echo $this->Form2->input('title');
        if (!empty($this->params['url']['date'])) {
            echo $this->Form2->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text', 'value' => $date));
        } else {
            echo $this->Form2->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
        }
        echo $this->Form2->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
        // echo $this->Form->input('allDay',array('id' => 'checkbox','onclick'=>'changeContent()'));
        echo $this->Form2->input('repeatTimes', array('label' => 'Repeat for how many times?', 'min' => 1));
        echo $this->Form2->input('frequency');
        ?>
    </fieldset>
    <?php echo $this->Form2->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker({dateFormat: 'dd-mm-yy'});
    $('#dateTimePickerEnd').datetimepicker({dateFormat: 'dd-mm-yy'});

    function changeContent() {
        if ($('#checkbox').prop('checked')) {
            $('#dateTimePickerEnd').hide();
        } else {
            $('#dateTimePickerEnd').show();
        }
    }
    $(document).ready(function() {
        var formattedDate = new Date($('#dateTimePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

        var hour = formattedDate.getHours();
        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();

        if (d.toString().length < 2) {
            d = "0" + d;
        }

        if (m.toString().length < 2) {
            m = "0" + m;
        }
        var check = $('#dateTimePickerStart').val();
        if ( check !== "") {
            $("#dateTimePickerStart").val(d + "-" + m + "-" + y);
        }
    });
</script>