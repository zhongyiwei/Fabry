<div class="eventsusers index">
    <h2><?php echo __('Eventsusers'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('eventsid'); ?></th>
            <th><?php echo $this->Paginator->sort('usersid'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($eventsusers as $eventsuser): ?>
            <tr>
                <td><?php echo h($eventsuser['Eventsuser']['eventsid']); ?>&nbsp;</td>
                <td><?php echo h($eventsuser['Eventsuser']['usersid']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $eventsuser['Eventsuser']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsuser['Eventsuser']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsuser['Eventsuser']['id']), null, __('Are you sure you want to delete # %s?', $eventsuser['Eventsuser']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Eventsuser'), array('action' => 'add')); ?></li>
    </ul>
</div>
