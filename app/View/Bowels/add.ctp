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
<div class="bowels form">
    <?php echo $this->Form->create('Bowel', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Add Bowel Movement Entry'); ?></legend>
        <?php
        echo $this->Form2->input('Bowel.date', array('id' => 'datePickerStart', 'type' => 'text'));
        echo $this->Form->input('count', array('min' => 0, 'max' => 6));
        echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
    $('#datePickerStart').datepicker({dateFormat: 'dd-mm-yy'}).val()
</script>