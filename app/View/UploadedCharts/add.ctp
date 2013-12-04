<div class="uploadedCharts form">
<?php echo $this->Form->create('Upload', array('type' => 'file'));?>
  <fieldset>
     <legend><?php __('Add Upload'); ?></legend>
  <?php
  echo $this->Form->input('title');
  echo $this->Form->input('description');
  echo $this->Form->input('file', array('type' => 'file'));
  echo $this->Form->input('User');
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uploaded Charts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
