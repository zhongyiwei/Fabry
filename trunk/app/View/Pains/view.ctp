<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pain'), array('action' => 'edit', $pain['Pain']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pain'), array('action' => 'delete', $pain['Pain']['id']), null, __('Are you sure you want to delete # %s?', $pain['Pain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pain'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="pains view">
<h2><?php echo __('Pain'); ?></h2>
	<dl>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php $timestamp = strtotime($pain['Pain']['date']);
				 echo date('d-m-Y', $timestamp) ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pain Level'); ?></dt>
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
	</dl>
</div>
