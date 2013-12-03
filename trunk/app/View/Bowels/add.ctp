<div class="bowels form">
<?php echo $this->Form->create('Bowel'); ?>
	<fieldset>
		<legend><?php echo __('Add Bowel'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('count', array('min'=>0, 'max'=>6));
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bowels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
