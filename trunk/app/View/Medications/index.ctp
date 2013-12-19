<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Entry'), array('action' => 'add?redirect=index')); ?></li>
        <li><?php echo $this->Html->link(__('Generate Medication Report'), array('controller' => 'PDF', 'action' => 'medicationReport/I')); ?> </li>
    </ul>
</div>

<div class="medications index">
    <h2><?php echo __('Medications'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Medication Name</th>
                <th>Strength of each Pill</th>
                <th>Dose Each Time</th>
                <th>Frequency</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medications as $medication): ?>
                <tr>
                    <td><?php echo h($medication['Medication']['medicationName']); ?>&nbsp;</td>
                    <td><?php echo h($medication['Medication']['strengthEachPill']); ?>&nbsp;</td>
                    <td><?php echo h($medication['Medication']['doseEachTime']); ?>&nbsp;</td>
                    <td><?php echo h($medication['Medication']['frequency']); ?>&nbsp;</td>
        <!--                    <td>
                    <?php // echo $this->Html->link($medication['Users']['id'], array('controller' => 'users', 'action' => 'view', $medication['Users']['id'])); ?>
                        </td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $medication['Medication']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medication['Medication']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medication['Medication']['id']), null, __('Are you sure you want to delete '.$medication['Medication']['medicationName'].' from your list of medications ?')); ?>
                        <?php // echo $this->Html->link(__('Medication Report'), array('controller' => 'PDF', 'action' => 'medicationReport', $medication['Medication']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
