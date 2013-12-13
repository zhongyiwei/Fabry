<div class="painmedis view">
<h2><?php echo __('Painmedi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($painmedi['Painmedi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pains'); ?></dt>
		<dd>
			<?php echo $this->Html->link($painmedi['Pains']['id'], array('controller' => 'pains', 'action' => 'view', $painmedi['Pains']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($painmedi['Users']['id'], array('controller' => 'users', 'action' => 'view', $painmedi['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medications'); ?></dt>
		<dd>
			<?php echo $this->Html->link($painmedi['Medications']['id'], array('controller' => 'medications', 'action' => 'view', $painmedi['Medications']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Painmedi'), array('action' => 'edit', $painmedi['Painmedi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Painmedi'), array('action' => 'delete', $painmedi['Painmedi']['id']), null, __('Are you sure you want to delete # %s?', $painmedi['Painmedi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Painmedis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Painmedi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pains'), array('controller' => 'pains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pains'), array('controller' => 'pains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medications'), array('controller' => 'medications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medications'), array('controller' => 'medications', 'action' => 'add')); ?> </li>
	</ul>
</div>
