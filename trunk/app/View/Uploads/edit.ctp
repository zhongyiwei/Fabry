<?php echo $this->Session->flash(); ?>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
   <h3 style="color:#f00;"><?php echo "*Mandatory Fields"; ?></h3>
  <ul>

    <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
    
  </ul>
</div>
<div class="uploads form">
<?php echo $this->Form->create('Upload', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Edit Upload'); ?></legend>
		 <h3 style="color:#f00;"><?php echo "*Mandatory Fields"; ?></h3>
	<?php		
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>