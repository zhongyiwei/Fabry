<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Back'), array('action' => 'eventParticipation')); ?></li>
    </ul>
</div>

<div class="invitations form">
    <?php echo $this->Form->create('Invitation'); ?>
    <fieldset>
        <legend><?php echo __('Add Invitation'); ?></legend>
        <?php
        $attendStatus = array('Attend' => 'Attend', 'Do not attend' => 'Do not attend');
        if (!empty($events)) {
            echo $this->Form->input('events_id');
        } else {
            echo $this->Form->input('events_id');
            echo "You have already added all the events in your index page. Please change response from event index page.";
        }
        echo $this->Form->input('response_status', array('options' => $attendStatus, 'default' => 'Attend'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
