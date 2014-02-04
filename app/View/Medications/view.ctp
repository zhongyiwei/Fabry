<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Medication'), array('action' => 'edit', $medication['Medication']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Medication'), array('action' => 'delete', $medication['Medication']['id']), null, __('Are you sure you want to delete ' . $medication['Medication']['medicationName'] . ' from your list of medications ?', $medication['Medication']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?> </li>
        <!--<li><?php // echo $this->Html->link(__('New Medication'), array('action' => 'add'));  ?> </li>-->
    </ul>
</div>

<div class="medications view">
    <h2><?php echo __('Medication'); ?></h2>
    <dl>
        <dt><?php echo __('Medication Name'); ?></dt>
        <dd>
            <?php echo h($medication['Medication']['medicationName']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Strength Each Pill'); ?></dt>
        <dd>
            <?php echo h($medication['Medication']['strengthEachPill']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Dose Each Time'); ?></dt>
        <dd>
            <?php echo h($medication['Medication']['doseEachTime']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Frequency'); ?></dt>
        <dd>
            <?php echo h($medication['Medication']['frequency']); ?>
            &nbsp;
        </dd>

    </dl>
</div>
