<div class="invitations form">
<?php echo $this->Form->create('Invitation'); ?>
	<fieldset>
		<legend><?php echo __('Add Invitation'); ?></legend>
	<?php
		echo $this->Form->input('users_id');
		echo $this->Form->input('events_id');
		echo $this->Form->input('response_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invitations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
