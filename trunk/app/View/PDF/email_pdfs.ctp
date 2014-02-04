<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<div class="painReport form">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Report'); ?>
    <fieldset>
        <legend><?php echo __('Email all Reports'); ?></legend>
        <p>Please choose the doctors you want to send</p>
        <?php
        echo $this->Form->select('users', $userName, array(
            'multiple' => 'checkbox'
        ));
        ?>
        <p>Please choose a start date and end date of the report you want to send</p>
        <?php
        echo $this->Form->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
        ?>
        <p>Please select the type of report you want to send your GP </p>
        <?php echo $reports = $this->Form->input('reports', array('options' => array('all' => 'all', 'Medication Report' => 'Medication Report', 'Pain Report' => 'Pain Report', 'Exercise Report' => 'Exercise Report', 'Bowel Report' => 'Bowel Report'))); ?>

    </fieldset>
    <?php echo $this->Form->end(__('Generate')); ?>
</div>
<script type="text/javascript">
    $('#dateTimePickerStart').datepicker({dateFormat: 'dd-mm-yy'}).val()
    $('#dateTimePickerEnd').datepicker({dateFormat: 'dd-mm-yy'}).val()
</script>