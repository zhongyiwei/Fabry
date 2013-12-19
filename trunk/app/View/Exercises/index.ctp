<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Entry'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Generate Exercise Report'), array('controller' => 'PDF', 'action' => 'exerciseReport/I')); ?> </li>
    </ul>
</div>

<div class="exercises index">
    <h2><?php echo __('Exercise Records'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Duration in Minutes</th>
                <th>Exercise Type</th>
                <th>Comment</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exercises as $exercise): ?>
                <tr>
                    <td><?php
                        $timestamp = strtotime($exercise['Exercise']['date']);
                        echo date('d-m-Y', $timestamp)
                        ?>&nbsp;</td>
                    <td><?php echo h($exercise['Exercise']['durationMinute']); ?>&nbsp;</td>
                    <td><?php echo h($exercise['Exercise']['exercise_type']); ?>&nbsp;</td>
                    <td><?php echo h($exercise['Exercise']['comment']); ?>&nbsp;</td>
    <!--                    <td>
                    <?php // echo $this->Html->link($exercise['Users']['id'], array('controller' => 'users', 'action' => 'view', $exercise['Users']['id']));   ?>
                    </td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id'])); ?>
                        <?php
                        $date = $exercise['Exercise']['date'];
                        $date = date('d-m-Y', strtotime($date));
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete your exercise entry on ' . $date . '?', $exercise['Exercise']['id']));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
