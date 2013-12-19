<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Invitation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Invitation.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Invitations'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="invitations form">
    <?php echo $this->Form->create('Invitation'); ?>
    <fieldset>
        <legend><?php echo __('Edit Invitation'); ?></legend>
        <?php
        $responseStatus = array('Attend' => 'Attend', 'Do not attend' => 'Do not attend');
        echo $this->Form->input('id');
        echo $this->Form->input('response_status', array('options' => $responseStatus, 'default' => 'Attend'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

