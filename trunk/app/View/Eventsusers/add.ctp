<div class="eventsusers form">
    <?php echo $this->Form->create('Eventsuser'); ?>
    <fieldset>
        <legend><?php echo __('Add Eventsuser'); ?></legend>
        <?php
        echo $this->Form->input('eventsid');
        echo $this->Form->input('usersid');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Eventsusers'), array('action' => 'index')); ?></li>
    </ul>
</div>
