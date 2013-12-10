<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Pains'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="pains form">
    <?php echo $this->Form->create('Pain'); ?>
    <fieldset>
        <legend><?php echo __('Add Pain'); ?></legend>
        <?php
        echo $this->Form->input('date', array('dateFormat' => 'DMY'));
        echo $this->Form->input('painLevel', array('min' => 0, 'max' => 10));
        echo $this->Form->input('medication');
        echo $this->Form->input('illness');
        echo "<h3>Medication Taken</h3>";
        echo $this->Form->select('medications', $medicationName, array(
            'multiple' => 'checkbox'
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

