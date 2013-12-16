<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Entry'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Generate Bowel Movement Report'), array('controller' => 'PDF', 'action' => 'bowelReport/I')); ?> </li>
    </ul>
</div>

<div class="bowels index">
    <h2><?php echo __('Bowel Movement Records'); ?></h2>
    <table cellpadding="0" cellspacing="0"  id="js-datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Movement Count</th>
                <th>Comments</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bowels as $bowel): ?>
                <tr>
                    <td><?php $timestamp = strtotime($bowel['Bowel']['date']);
							 echo date('d-m-Y', $timestamp) ?>&nbsp;</td>
                    <td><?php echo h($bowel['Bowel']['count']); ?>&nbsp;</td>
                    <td><?php echo h($bowel['Bowel']['comment']); ?>&nbsp;</td>
<!--                    <td>
                        <?php // echo $this->Html->link($bowel['Users']['id'], array('controller' => 'users', 'action' => 'view', $bowel['Users']['id'])); ?>
                    </td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $bowel['Bowel']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bowel['Bowel']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bowel['Bowel']['id']), null, __('Are you sure you want to delete the movement recored on '.$bowel['Bowel']['date'].' from the list')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
