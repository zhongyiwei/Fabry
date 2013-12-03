<div class="events form">

<?php echo $this->Form->create('Appointment', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('New Appointment'); ?></legend>
	<?php
	
		//displays the dropdown menu that contains Contacts
		echo $this->Form->select('contacts_id', $contacts);
		//link to add new contacts
		echo $this->Html->link('Add New Contact', array('controller' => 'contacts', 'action' => 'add'));
		//date input box
		//echo $this->Form->input('date');
		
		echo $this->Form->input('date', array(
		'label' => 'Date',
		'dateFormat' => 'DMY',
		//'minYear' => date('Y') - 70,
		//'maxYear' => date('Y') - 18,
		));
		
		
		//description input box
		echo $this->Form->input('description');
	?>
	</fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">

	<ul>

		<!--
		<li><?php //echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		-->
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
	</ul>
</div>
