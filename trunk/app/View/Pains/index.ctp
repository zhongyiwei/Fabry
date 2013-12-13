<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Pain'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Generate Pain Report'), array('controller' => 'PDF', 'action' => 'painReport/I')); ?> </li>
    </ul>
</div>

<div class="pains index">
    <h2><?php echo __('Pain Records'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Pain Level</th>
                <th>Medication</th>
                <th>Illness</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pains as $pain): ?>
                <tr>
                    <td>
                        <?php $timestamp = strtotime($pain['Pain']['date']);
                        echo date('d-m-Y', $timestamp)
                        ?>&nbsp;</td>
                    <td><?php echo h($pain['Pain']['painLevel']); ?>&nbsp;</td>
                    <td><?php $status = ($pain['Pain']['medication'] == 1 ? "Taken" : "Not Taken");
                    echo h($status);
                    ?>&nbsp;</td>
                    <td><?php echo h($pain['Pain']['illness']); ?>&nbsp;</td>
        <!--                    <td>
                        <?php // echo $this->Html->link($pain['Users']['id'], array('controller' => 'users', 'action' => 'view', $pain['Users']['id']));   ?>
                        </td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $pain['Pain']['id'])); ?>
    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pain['Pain']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pain['Pain']['id']), null, __('Are you sure you want to delete # %s?', $pain['Pain']['id'])); ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
