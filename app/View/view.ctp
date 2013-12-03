<div class="calendarEvents view">
<h2><?php echo __('Calendar Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarEvent['CalendarEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($calendarEvent['CalendarEvent']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($calendarEvent['CalendarEvent']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($calendarEvent['CalendarEvent']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AllDay'); ?></dt>
		<dd>
			<?php echo h($calendarEvent['CalendarEvent']['allDay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($calendarEvent['Users']['id'], array('controller' => 'users', 'action' => 'view', $calendarEvent['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Event'), array('action' => 'edit', $calendarEvent['CalendarEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Event'), array('action' => 'delete', $calendarEvent['CalendarEvent']['id']), null, __('Are you sure you want to delete # %s?', $calendarEvent['CalendarEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
