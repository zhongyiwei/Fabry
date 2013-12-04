<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<div class="mediReport form">
    <?php echo $this->Form->create('Medication'); ?>
    <fieldset>
        <legend><?php echo __('Create Medication Report'); ?></legend>
        <?php
        echo $this->Form->input('start', array('id' => 'dateTimePickerStart','type'=>'text'));
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd','type'=>'text'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Generate')); ?>
</div>
<script type="text/javascript">
    $('#dateTimePickerStart').datepicker({ dateFormat: 'dd-mm-yy' }).val()
    $('#dateTimePickerEnd').datepicker({ dateFormat: 'dd-mm-yy' }).val()
</script>