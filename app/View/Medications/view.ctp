<div class="medications view">
<h2><?php echo __('Medication'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MedicationName'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['medicationName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('StrengthEachPill'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['strengthEachPill']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DoseEachTime'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['doseEachTime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frequency'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['frequency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medication['Users']['id'], array('controller' => 'users', 'action' => 'view', $medication['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medication'), array('action' => 'edit', $medication['Medication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medication'), array('action' => 'delete', $medication['Medication']['id']), null, __('Are you sure you want to delete # %s?', $medication['Medication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medication'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
