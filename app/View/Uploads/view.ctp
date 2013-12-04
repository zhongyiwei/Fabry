<div class="uploads view">
<h2><?php echo __('Upload'); ?></h2>
	<dl>
		
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['filename']); ?>
			&nbsp;
		</dd>
	
		<dt><?php echo __('Created'); ?></dt>
		<dd><?php $timestamp = strtotime($upload['Upload']['created']);
			echo date('d-m-Y', $timestamp);?>
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php $timestamp = strtotime($upload['Upload']['modified']);
			echo date('d-m-Y', $timestamp);?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Download'), array('action' => 'download', $upload['Upload']['filename'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Upload'), array('action' => 'edit', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Upload'), array('action' => 'delete', $upload['Upload']['id']), null, __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?> </li>
	</ul>
</div>
