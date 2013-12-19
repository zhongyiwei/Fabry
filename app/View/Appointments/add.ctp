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

    <ul>

        <!--
        <li><?php //echo $this->Html->link(__('List Events'), array('action' => 'index'));      ?></li>
        -->
        <li><?php echo $this->Html->link(__('Back to Calendar'), array('action' => 'calendarEvent', 'controller' => 'calendarevents')); ?></li>
        <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="events form">

    <?php echo $this->Form->create('Appointment', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('New Appointment'); ?>

        </legend>
        <?php
        if (!empty($this->params['url']['date'])) {
            $date = $this->params['url']['date'];
        }

        //displays the dropdown menu that contains Contacts
        echo $this->Form->select('contacts_id', $contacts, array('style' => 'float:left;margin-left: 7px;'));
        //link to add new contacts
        echo $this->Html->image("add.png", array("alt" => "add", 'name' => "add", 'height' => "40", 'style' => "background: #FFF; margin:-7px 0px 7px 5px;", 'url' => array('controller' => 'contacts', 'action' => 'add?redirect=event')));

        //date input box
        //echo $this->Form->input('date');
//		echo $this->Form->input('date', array(
//		'label' => 'Date',
//		'dateFormat' => 'DMY',
//		//'minYear' => date('Y') - 70,
//		//'maxYear' => date('Y') - 18,
//		));
        if (!empty($this->params['url']['date'])) {
            echo $this->Form->input('date', array('id' => 'dateTimePickerStart', 'type' => 'text', 'value' => $date));
        } else {
            echo $this->Form->input('date', array('id' => 'dateTimePickerStart', 'type' => 'text'));
        }


        //description input box
        echo $this->Form->input('description');
        ?>
    </fieldset>

    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker({dateFormat: 'dd-mm-yy'});

    $(document).ready(function() {
        var formattedDate = new Date($('#dateTimePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

        var hour = formattedDate.getHours();
        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();

        if (d.toString().length < 2) {
            d = "0" + d;
        }

        if (m.toString().length < 2) {
            m = "0" + m;
        }
        $("#dateTimePickerStart").val(d + "-" + m + "-" + y);
    });
</script>