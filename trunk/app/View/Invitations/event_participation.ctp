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
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $invitation['Invitation']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invitation['Invitation']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invitation['Invitation']['id']), null, __('Are you sure you want to delete # %s?', $invitation['Invitation']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Invitation'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Events'), array('controller' => 'events', 'action' => 'add')); ?> </li>
    </ul>
</div>
