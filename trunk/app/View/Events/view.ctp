<div class="events view">
    <h2><?php echo __('Event'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($event['Event']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($event['Event']['description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Start'); ?></dt>
        <dd>
            <?php echo h($event['Event']['start']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('End'); ?></dt>
        <dd>
            <?php echo h($event['Event']['end']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('AllDay'); ?></dt>
        <dd>
            <?php echo h($event['Event']['allDay']); ?>
            &nbsp;
        </dd>
    </dl>
    <br/>
    <?php     if ($current_user['role'] != 'member') { ?>
    <h3>Response List</h3>
    <?php
    // debug($invitationData);

        echo "<table id='js-datatable'>
                <thead>
                <th>User Name</th>
                <th>Response Status</th>
                </thead>
                <tbody>";

        for ($i = 0; $i < count($invitationData); $i++) {

            $userName = $invitationData[$i]['Users']['firstName'] . " " . $invitationData[$i]['Users']['lastName'] . " ( " . $invitationData[$i]['Users']['email'] . " )";
            $attendStatus = $invitationData[$i]['Invitation']['response_status'];

            echo "<tr><td>$userName</td>";
            echo "<td>$attendStatus</td></tr>";
        }
        echo "</tbody></table>";
    }
    ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
    </ul>
</div>
