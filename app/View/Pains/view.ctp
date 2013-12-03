<div class="pains view">
<h2><?php echo __('Pain'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pain['Pain']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($pain['Pain']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PainLevel'); ?></dt>
		<dd>
			<?php echo h($pain['Pain']['painLevel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medication'); ?></dt>
		<dd>
			<?php echo h($pain['Pain']['medication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Illness'); ?></dt>
		<dd>
			<?php echo h($pain['Pain']['illness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pain['Users']['id'], array('controller' => 'users', 'action' => 'view', $pain['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pain'), array('action' => 'edit', $pain['Pain']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pain'), array('action' => 'delete', $pain['Pain']['id']), null, __('Are you sure you want to delete # %s?', $pain['Pain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pain'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
