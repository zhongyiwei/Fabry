<div class="scannedCharts form">
<?php echo $this->Form->create('ScannedChart'); ?>
	<fieldset>
		<legend><?php echo __('Edit Scanned Chart'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ScannedChart.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ScannedChart.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Scanned Charts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
