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

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CalendarEvent.id')), null, __('Are you sure you want to delete '.$this->Form->value('CalendarEvent.title').' from the event list?')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
        
    </ul>
</div>
<div class="calendarEvents form">
    <?php echo $this->Form->create('CalendarEvent', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Edit Personal Event'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title');
        echo $this->Form->input('start', array('id' => 'dateTimePickerStart','type'=>'text'));
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd','type'=>'text'));
        echo $this->Form->input('allDay');
        echo $this->Form->input('repeat');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $.datepicker.formatDate( "yy-mm-dd");
    $('#dateTimePickerStart').datetimepicker({
    });
    $('#dateTimePickerEnd').datetimepicker({
    });
</script>