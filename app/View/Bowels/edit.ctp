<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bowel.id')), null, __('Are you sure you want to delete '.$this->Form->value('Bowel.date').'?', $this->Form->value('Bowel.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bowels'), array('action' => 'index')); ?></li>
	</ul>
</div>

<div class="bowels form">
<?php echo $this->Form->create('Bowel'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bowel'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date',array('dateFormat' => 'DMY'));
		echo $this->Form->input('count', array('min'=>0, 'max'=>6));
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>