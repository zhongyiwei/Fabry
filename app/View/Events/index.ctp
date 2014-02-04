<?php echo $this->Session->flash(); ?>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#js-datatable').dataTable({
            "aaSorting": [[0, "desc"]],
            "aoColumns": [
                /*   id  */  {"bSearchable": false,
                    "bVisible": false},
                /* title */  null,
                /* description */ null,
                /* start */  null,
                /* end */    null,
                /* actions */ null,
            ]});
    });
</script>
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
                <th>ID</th>
                <th>Title</th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th><?php echo $this->Paginator->sort('start'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
<!--                <th><?php echo $this->Paginator->sort('allDay', 'all day'); ?></th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($events as $event):
                $start = date('d-m-Y G:i', strtotime($event['Event']['start']));
                $end = date('d-m-Y G:i', strtotime($event['Event']['end']));
                ?>
                <tr>
                    <td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['title']); ?>&nbsp;</td>          
                    <td><?php echo h($event['Event']['description']); ?>&nbsp;</td>
                    <td><?php echo h($start); ?>&nbsp;</td>
                    <td><?php echo h($end); ?>&nbsp;</td>
    <!--                    <td><?php echo h($event['Event']['allDay']); ?>&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('Detail and Response List'), array('action' => 'view', $event['Event']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
                        <?php
                        echo $this->Form->postLink(__('Cancel Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete the event that starts on the ' . $event['Event']['start'] . ' ?', $event['Event']['id']));
                        if ($event['Event']['send_status'] == 'false') {
                            echo $this->Html->link(__('Send to members'), array('action' => 'emailsubscriber', $event['Event']['id']), null, __('Are you sure you want to proceed?'));
                            ;
                        } else {
                            echo $this->Html->link(__('Resend this invitation'), array('action' => 'emailsubscriber', $event['Event']['id']), array('style' => 'padding-left:13px; padding-right:13px;'), __('Are you sure you want to proceed?'));
                        }
                        ?>

                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
