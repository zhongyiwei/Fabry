<?php echo $this->Session->flash(); ?>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#js-datatable').dataTable({
            "aaSorting": [[0, "desc"]],
            "aoColumns": [
                /*   id  */  {"bSearchable": false,
                    "bVisible": false},
                /* title */  null,
                /* start */ null,
                /* actions */ null,
            ]});
    });
</script>
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
                <th>id</th>
                <th>Title</th>
                <th>Start Date</th>
                <!-- <th>End Date</th> -->

                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendarEvents as $calendarEvent): ?>
                <tr>
                    <td><?php echo h($calendarEvent['CalendarEvent']['id']); ?>&nbsp;</td>
                    <td><?php echo h($calendarEvent['CalendarEvent']['title']); ?>&nbsp;</td>
                    <td><?php
                $timestamp = strtotime($calendarEvent['CalendarEvent']['start']);
                echo date('d-m-Y H:i', $timestamp)
                ?>&nbsp;</td>
                    <!-- <td><?php
                    $timestamp = strtotime($calendarEvent['CalendarEvent']['end']);
                    echo date('d-m-Y H:i', $timestamp)
                ?>&nbsp;</td> -->

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

