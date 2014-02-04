<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>



<script type="text/javascript">
$(document).ready(function() {
    
    //limit painlevel value to only integer
    $('#painLevel').keypress(function (key) {
        if (key.charCode < 48 || key.charCode > 57) return false;
    });
    
    $('#painLevel').keyup(function () {
    //limit painlevel value to between 0 and 10
    var thisVal = parseInt($(this).val(), 10);
    if (!isNaN(thisVal)) {
        thisVal = Math.max(0, Math.min(10, thisVal));
        $(this).val(thisVal);
        }
    });
});
</script>


<?php echo $this->Session->flash(); ?>
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
        echo $this->Form->input('painLevel', array('id' => 'painLevel', 'min' => 0, 'max' => 10));
        echo $this->Form->input('medication', array('label' => 'Taken Any Medication?'));
        echo $this->Form->input('illness', array('label' => 'Symptons'));
        echo $this->Html->image("addMedi.png", array("alt" => "add", 'name' => "add", 'height' => "40", 'style' => "background: #FFF; margin:-7px 0px 7px 195px;", 'url' => array('controller' => 'medications', 'action' => 'add?redirect=pain')));
        echo "<h3 style='margin: -45px 0 0 0;'>Medication Taken</h3>";
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

