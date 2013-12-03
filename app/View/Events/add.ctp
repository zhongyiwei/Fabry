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
<div class="events form">
    <?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Add Event'); ?></legend>
        <?php
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
    <?php echo $this->Form->end(__('Save and send email')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
    </ul>
</div>
<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker();
    $('#dateTimePickerEnd').datetimepicker();
</script>