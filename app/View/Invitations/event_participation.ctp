<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php
            if (!empty($events)) {
                echo $this->Html->link(__('Join Event'), array('action' => 'add'));
            };
            ?></li>
    </ul>
</div>

<div class="invitations index">
    <h2><?php echo __('Events'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Response Status</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invitationData as $invitation): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($invitation['Events']['title'], array('controller' => 'events', 'action' => 'view', $invitation['Events']['id'])); ?>
                    </td>
                    <td><?php echo h($invitation['Invitation']['response_status']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Change Response'), array('action' => 'editResponse', $invitation['Invitation']['id'])); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
