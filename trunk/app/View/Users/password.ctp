<div class="users form">
<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
	<fieldset>
		<h2><?php echo __('Change Password'); ?></h2>
	<?php  
	/*echo $this->Form->input('current_password', array('label'=>'Current Password', 'type'=>'password'));*/
        echo $this->Form->input('password', array('label'=>'Password - at least 4 characters/numbers','type'=>'password'));
        echo $this->Form->input('password1', array('label'=>'Confirm Password','type'=>'password'));
	?>
		</fieldset>
<?php if ($current_user['role'] == 'super'):
$userId = $current_user['id'];?>	
<?php echo $this->Form->end(__('Submit'),array('controller'=>'users', 'action' => 'index')); ?>

		<?php endif; ?>
<?php if ($current_user['role'] == 'admin'):
$userId = $current_user['id'];?>	
<?php echo $this->Form->end(__('Submit'),array('controller'=>'users', 'action' => 'index')); ?>

		<?php endif; ?>
<?php if($current_user['role'] == 'member'):
		$userId = $current_user['id'];?>
		<?php echo $this->Form->end(__('Submit'), array('controller'=>'users','action'=>"view/$userId")); ?>
		<?php endif; ?>

      
</div>
<div class="actions">
           
	<ul>
		<?php if ($current_user['role'] == 'super'):?>									<?php // this if statement used to control the content will be displayed to user (The member can not delete any user account while the admin allow to delete members' account). ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<?php endif; ?>
		<?php if ($current_user['role'] == 'admin'):?>									<?php // this if statement used to control the content will be displayed to user (The member can not delete any user account while the admin allow to delete members' account). ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<?php endif; ?>
		<li><?php 
		$userId = $current_user['id'];
		echo $this->Html->link(__('Members profile '), array('controller'=>'users','action'=>"view/$userId")); ?></li>
	</ul>
</div>
