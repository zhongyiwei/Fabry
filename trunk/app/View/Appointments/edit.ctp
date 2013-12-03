<div class="events form">
<?php echo $this->Form->create('Appointment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Appointment'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->select('contacts_id', $contacts);
		
		//echo $this->Form->input('date');
		echo $this->Form->input('date', array(
		'label' => 'Date',
		'dateFormat' => 'DMY',
		//'minYear' => date('Y') - 70,
		//'maxYear' => date('Y') - 18,
		));
		
		
		
		echo $this->Form->input('description');
	?>
	</fieldset>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
	</ul>
</div>
