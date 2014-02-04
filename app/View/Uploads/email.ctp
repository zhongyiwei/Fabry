<div class="uploads form">
<?php echo $this->Form->create('Upload');?>
  <fieldset>
  <legend><?php echo('Enter Email Details'); ?></legend>
  <h3 style="color:#f00;"><?php echo "*Mandatory Fields"; ?></h3>
	 
  <?php
  echo $this->Form->input('emailto', array('label'=>'Email Address'));;
  echo $this->Form->input('subject');
  echo $this->Form->textarea('body', array('rows' => 3));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit'), array('action' => 'email'));?>
</div>
