<div class="exercises form">
<?php echo $this->Form2->create('Exercise'); ?>
	<fieldset>
		<legend><?php echo __('Edit Exercise'); ?></legend>
	<?php
		echo $this->Form2->input('id');
		echo $this->Form2->input('date');
		echo $this->Form2->input('durationMinute');
		echo $this->Form2->input('comment');
	?>
	</fieldset>
<?php echo $this->Form2->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Exercise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
