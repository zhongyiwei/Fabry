
<div class="actions">
	<ul>
	<?php 
			if ($current_user['role']== 'admin' ||  $current_user['role']== 'super') :?> 
		<li><?php echo $this->Html->link(__('Go Back'), array('controller'=>'contacts','action'=>'index'));?></a></li>
		<?php elseif ($current_user['role']== 'member'): ?>
		<li><?php echo $this->Html->link(__('Go Back'), array('controller'=>'contacts','action'=>'memindex'));?></a></li>
		<?php endif; ?>
	</ul>

</div>


<div class="contacts form">
            <?php echo $this->Form->create('Contact', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Add Contact'); ?></legend>
	<?php
		echo $this->Form->input('centerName');
		echo $this->Form->input('doctor');
		echo $this->Form->input('address', array('label'=> ' Number / Street Name'));
		echo $this->Form->input('suburb');
		echo $this->Form->input('postal', array('label'=>'Postcode'));
		echo $this->Form->input('state');
		echo $this->Form->input('country');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
	////elisha!!!!!!!!!!

		echo $this->Form->input('isOfficial', array('type'=>'checkbox','checked'=>true));
		echo $this->Form->input('users_id', array('default'=>'Official Type', 'options'=>array('3'=>'admin')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?></li>
	</ul>
</div>
