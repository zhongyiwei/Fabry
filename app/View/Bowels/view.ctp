<div class="bowels view">
<h2><?php echo __('Bowel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bowel['Bowel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($bowel['Bowel']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count'); ?></dt>
		<dd>
			<?php echo h($bowel['Bowel']['count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($bowel['Bowel']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bowel['Users']['id'], array('controller' => 'users', 'action' => 'view', $bowel['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bowel'), array('action' => 'edit', $bowel['Bowel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bowel'), array('action' => 'delete', $bowel['Bowel']['id']), null, __('Are you sure you want to delete # %s?', $bowel['Bowel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bowels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bowel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
