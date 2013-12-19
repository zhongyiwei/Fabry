<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Personal Event'), array('action' => 'add')); ?></li>
        
        
    </ul>
</div>
<div class="calendarEvents index">
    <h2><?php echo __('Personal Events'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>All Day</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendarEvents as $calendarEvent): ?>
                <tr>
                    <td><?php echo h($calendarEvent['CalendarEvent']['title']); ?>&nbsp;</td>
                    <td><?php echo h($calendarEvent['CalendarEvent']['start']); ?>&nbsp;</td>
                    <td><?php echo h($calendarEvent['CalendarEvent']['end']); ?>&nbsp;</td>
                    <td><?php echo h($calendarEvent['CalendarEvent']['allDay']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $calendarEvent['CalendarEvent']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calendarEvent['CalendarEvent']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calendarEvent['CalendarEvent']['id']), null, __('Are you sure you want to delete # %s?', $calendarEvent['CalendarEvent']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

