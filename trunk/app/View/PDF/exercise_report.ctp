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
    <?php echo $this->Form->create('Exercise'); ?>
    <fieldset>
        <legend><?php echo __('Create Exercise Report'); ?></legend>
        <?php
        echo $this->Form->input('start', array('id' => 'dateTimePickerStart','type'=>'text'));
        echo $this->Form->input('end', array('id' => 'dateTimePickerEnd','type'=>'text'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Generate')); ?>
</div>
<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker();
    $('#dateTimePickerEnd').datetimepicker();
</script>