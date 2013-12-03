<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Generate Exercise Report'), array('controller' => 'PDF', 'action' => 'exerciseReport')); ?> </li>
    </ul>
</div>

<div class="exercises index">
    <h2><?php echo __('Exercises'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Duration in Minutes</th>
                <th>Comment</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exercises as $exercise): ?>
                <tr>
                    <td><?php echo h($exercise['Exercise']['date']); ?>&nbsp;</td>
                    <td><?php echo h($exercise['Exercise']['durationMinute']); ?>&nbsp;</td>
                    <td><?php echo h($exercise['Exercise']['comment']); ?>&nbsp;</td>
    <!--                    <td>
                    <?php // echo $this->Html->link($exercise['Users']['id'], array('controller' => 'users', 'action' => 'view', $exercise['Users']['id'])); ?>
                    </td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s?', $exercise['Exercise']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
