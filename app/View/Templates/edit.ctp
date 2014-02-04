<?php echo $this->Session->flash(); ?>
<div class="templates form">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Template.id')), null, __('Are you sure you want to delete template "'.$this->Form->value('Template.title').'"?')); ?></li>
		<li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php echo $this->Form->create('Template',array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Edit Template'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

