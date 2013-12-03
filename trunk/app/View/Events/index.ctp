<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
    </ul>
</div>

<div class="events index">
    <h2><?php echo __('Events'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Title</th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th><?php echo $this->Paginator->sort('start'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
<!--                <th><?php echo $this->Paginator->sort('allDay'); ?></th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($events as $event):
                $start = date('Y-m-d G:i', strtotime($event['Event']['start']));
                $end = date('Y-m-d G:i', strtotime($event['Event']['end']));
                ?>
                <tr>
                    <td><?php echo h($event['Event']['title']); ?>&nbsp;</td>          
                    <td><?php echo h($event['Event']['description']); ?>&nbsp;</td>
                    <td><?php echo h($start); ?>&nbsp;</td>
                    <td><?php echo h($end); ?>&nbsp;</td>
    <!--                    <td><?php echo h($event['Event']['allDay']); ?>&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('Event Detail and Response List'), array('action' => 'view', $event['Event']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
