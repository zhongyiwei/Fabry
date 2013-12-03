<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invitation'), array('action' => 'edit', $invitation['Invitation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invitation'), array('action' => 'delete', $invitation['Invitation']['id']), null, __('Are you sure you want to delete # %s?', $invitation['Invitation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invitations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invitation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="invitations view">
<h2><?php echo __('Invitation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invitation['Invitation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invitation['Users']['id'], array('controller' => 'users', 'action' => 'view', $invitation['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Events'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invitation['Events']['id'], array('controller' => 'events', 'action' => 'view', $invitation['Events']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response Status'); ?></dt>
		<dd>
			<?php echo h($invitation['Invitation']['response_status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
