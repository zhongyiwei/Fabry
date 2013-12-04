<div class="uploadedCharts index">
	<h2><?php echo __('Uploaded Charts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<th><?php echo $this->Paginator->sort('filesize'); ?></th>
			<th><?php echo $this->Paginator->sort('filemime'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uploadedCharts as $uploadedChart): ?>
	<tr>
		<td><?php echo h($uploadedChart['UploadedChart']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uploadedChart['User']['id'], array('controller' => 'users', 'action' => 'view', $uploadedChart['User']['id'])); ?>
		</td>
		<td><?php echo h($uploadedChart['UploadedChart']['title']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['description']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['filename']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['filesize']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['filemime']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['created']); ?>&nbsp;</td>
		<td><?php echo h($uploadedChart['UploadedChart']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uploadedChart['UploadedChart']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uploadedChart['UploadedChart']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uploadedChart['UploadedChart']['id']), null, __('Are you sure you want to delete # %s?', $uploadedChart['UploadedChart']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Uploaded Chart'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
