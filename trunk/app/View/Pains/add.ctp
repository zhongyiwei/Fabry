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
<div class="pains form">
    <?php echo $this->Form->create('Pain', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Add Pain Entry'); ?></legend>
        <?php
        echo $this->Form2->input('Pain.date', array('id' => 'datePickerStart', 'type' => 'text'));
        echo $this->Form->input('painLevel', array('min' => 0, 'max' => 10));
        echo $this->Form->input('medication');
        echo $this->Form->input('illness',array('label'=>'Symptons'));
        echo "<h3>Medication Taken</h3>";
        echo $this->Html->image("addMedi.png", array("alt" => "add", 'name' => "add", 'height' => "40", 'style' => "background: #FFF; margin:-7px 0px 7px 5px;", 'url' => array('controller' => 'medications', 'action' => 'add?redirect=event')));
        echo $this->Form->select('medications', $medicationName, array(
            'multiple' => 'checkbox'
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $('#datePickerStart').datepicker({dateFormat: 'dd-mm-yy'}).val()
</script>