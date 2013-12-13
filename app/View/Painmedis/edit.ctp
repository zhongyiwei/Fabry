<div class="painmedis form">
<?php echo $this->Form->create('Painmedi'); ?>
	<fieldset>
		<legend><?php echo __('Edit Painmedi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pains_id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('medications_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Painmedi.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Painmedi.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Painmedis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pains'), array('controller' => 'pains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pains'), array('controller' => 'pains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medications'), array('controller' => 'medications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medications'), array('controller' => 'medications', 'action' => 'add')); ?> </li>
	</ul>
</div>
