<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pain.id')), null, __('Are you sure you want to delete the pain record on '.date('d-m-Y', strtotime($this->Form->value('Pain.date'))).' from the list?')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="pains form">
    <?php echo $this->Form->create('Pain', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Edit Pain Record'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('date', array('dateFormat' => 'DMY'));
        echo $this->Form->input('painLevel', array('min' => 0, 'max' => 10));
        echo $this->Form->input('medication');
        echo $this->Form->input('illness');
//        echo "<h3>Medication Taken</h3>";
//        echo $this->Form->select('medications', $medicationName, array(
//            'multiple' => 'checkbox'
//        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

