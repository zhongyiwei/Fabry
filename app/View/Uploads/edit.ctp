<?php echo $this->Session->flash(); ?>
<div class="uploads form">
<?php echo $this->Form->create('Upload', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Edit Upload'); ?></legend>
	<?php		
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>