<div class="pains form">
<?php echo $this->Form->create('Pain'); ?>
	<fieldset>
		<legend><?php echo __('Add Pain'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('painLevel', array('min'=>0, 'max'=>10));
		echo $this->Form->input('medication');
		echo $this->Form->input('illness');
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pains'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
