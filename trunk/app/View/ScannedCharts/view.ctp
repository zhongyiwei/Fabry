<div class="scannedCharts view">
<h2><?php echo __('Scanned Chart'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($scannedChart['ScannedChart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($scannedChart['ScannedChart']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($scannedChart['ScannedChart']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($scannedChart['User']['id'], array('controller' => 'users', 'action' => 'view', $scannedChart['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Scanned Chart'), array('action' => 'edit', $scannedChart['ScannedChart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Scanned Chart'), array('action' => 'delete', $scannedChart['ScannedChart']['id']), null, __('Are you sure you want to delete # %s?', $scannedChart['ScannedChart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Scanned Charts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Scanned Chart'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
