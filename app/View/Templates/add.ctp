<?php echo $this->Session->flash(); ?>
<div class="templates form">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php echo $this->Form->create('Template',array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Add Template'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

