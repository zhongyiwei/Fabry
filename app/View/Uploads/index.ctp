<div class="uploads index">
	<h2><?php echo __('External Medical Records Uploaded'); ?></h2>
	
	<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?></li>
	</ul>
</div>

	<table cellpadding="0" cellspacing="0">
	<tr>
			
			
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
		
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uploads as $upload): ?>
	<tr>
	
		<td><?php echo h($upload['Upload']['title']); ?>&nbsp;</td>
		<td><?php echo h($upload['Upload']['description']); ?>&nbsp;</td>
		<td><?php echo h($upload['Upload']['filename']); ?>&nbsp;</td>
		<td><?php $timestamp = strtotime($upload['Upload']['created']);
			echo date('d-m-Y', $timestamp);?>
		
		
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $upload['Upload']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $upload['Upload']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $upload['Upload']['id']), null, __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?>
			<?php echo $this->Html->link(__('Download'), array('action' => 'download', $upload['Upload']['filename'])); ?> </li>
			<?php echo $this->Html->link(__('Send Email'), array('action' => 'email', $upload['Upload']['filename'])); ?> </li>
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

