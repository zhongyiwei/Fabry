<div class="eventsusers view">
<h2><?php echo __('Eventsuser'); ?></h2>
	<dl>
		<dt><?php echo __('Eventsid'); ?></dt>
		<dd>
			<?php echo h($eventsuser['Eventsuser']['eventsid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usersid'); ?></dt>
		<dd>
			<?php echo h($eventsuser['Eventsuser']['usersid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Eventsuser'), array('action' => 'edit', $eventsuser['Eventsuser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Eventsuser'), array('action' => 'delete', $eventsuser['Eventsuser']['id']), null, __('Are you sure you want to delete # %s?', $eventsuser['Eventsuser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventsusers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Eventsuser'), array('action' => 'add')); ?> </li>
	</ul>
</div>
