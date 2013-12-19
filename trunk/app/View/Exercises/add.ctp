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

        <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="exercises form">
    <?php echo $this->Form2->create('Exercise', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Add Exercise Entry'); ?></legend>
        <?php
        echo $this->Form2->input('Exercise.date', array('id' => 'datePickerStart', 'type' => 'text'));
        echo $this->Form2->input('durationMinute');
        echo $this->Form2->input('exercise_type');
        echo $this->Form2->input('comment');
        ?>
    </fieldset>
    <?php echo $this->Form2->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $('#datePickerStart').datepicker({dateFormat: 'dd-mm-yy'}).val();
</script>