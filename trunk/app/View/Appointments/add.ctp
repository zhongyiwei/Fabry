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
		<li><?php //echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		-->
		<li><?php echo $this->Html->link(__('Back to Calendar'), array('action' => 'calendarEvent','controller'=>'calendarevents')); ?></li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index')); ?></li>
	</ul>
</div>
<div class="events form">

<?php echo $this->Form->create('Appointment', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('New Appointment'); ?>

                </legend>
	<?php
	
		//displays the dropdown menu that contains Contacts
		echo $this->Form->select('contacts_id', $contacts, array('style'=>'float:left;margin-left: 7px;'));
		//link to add new contacts
                                echo $this->Html->image("add.png", array("alt" => "add", 'name' => "add", 'height' => "30", 'style' => "background: #FFF; display:block; margin:-7px 0px;", 'url' => array('controller' => 'contacts', 'action' => 'add?redirect=event')));
		//date input box
		//echo $this->Form->input('date');
		
//		echo $this->Form->input('date', array(
//		'label' => 'Date',
//		'dateFormat' => 'DMY',
//		//'minYear' => date('Y') - 70,
//		//'maxYear' => date('Y') - 18,
//		));
		        echo $this->Form->input('date', array('id' => 'dateTimePickerStart','type'=>'text'));
		
		//description input box
		echo $this->Form->input('description');
	?>
	</fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker();
</script>