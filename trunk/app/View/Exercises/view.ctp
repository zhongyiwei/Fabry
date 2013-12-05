<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete your exercise session on '.$exercise['Exercise']['date'].'?', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="exercises view">
<h2><?php echo __('Exercise'); ?></h2>
	<dl>
		<dt><?php echo __('Date'); ?></dt>
		<dd>

			<?php $timestamp = strtotime($exercise['Exercise']['date']);
			 echo date('d-m-Y', $timestamp)
			 ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration Minute'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['durationMinute']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
