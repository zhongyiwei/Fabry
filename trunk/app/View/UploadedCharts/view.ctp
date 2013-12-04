<div class="uploadedCharts view">
<h2><?php echo __('Uploaded Chart'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uploadedChart['User']['id'], array('controller' => 'users', 'action' => 'view', $uploadedChart['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['filesize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filemime'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['filemime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($uploadedChart['UploadedChart']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uploaded Chart'), array('action' => 'edit', $uploadedChart['UploadedChart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uploaded Chart'), array('action' => 'delete', $uploadedChart['UploadedChart']['id']), null, __('Are you sure you want to delete # %s?', $uploadedChart['UploadedChart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Charts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Chart'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
