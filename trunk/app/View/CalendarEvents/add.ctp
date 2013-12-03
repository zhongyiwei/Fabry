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
<div class="calendarEvents form">
    <?php echo $this->Form->create('CalendarEvent'); ?>
    <fieldset>
        <legend><?php echo __('Add Calendar Event'); ?></legend>
        <?php
        if (!empty($this->params['url']['date'])) {
            $date = $this->params['url']['date'];
        }
        echo $this->Form->input('title');
        if (!empty($this->params['url']['date'])) {
            echo $this->Form->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text', 'value' => $date));
        } else {
            echo $this->Form->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
        }
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
        echo $this->Form->input('allDay');
        echo $this->Form->input('repeat');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Calendar Events'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker();
    $('#dateTimePickerEnd').datetimepicker();
</script>