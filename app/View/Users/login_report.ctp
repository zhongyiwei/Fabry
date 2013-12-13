<?php
echo $this->Html->script('jquery.dataTables.min.js');
echo $this->Html->css('jquery.dataTables.css');
?>
<div class="users index">
    <h2><?php echo __('Members who does not login for 2 years'); ?></h2>


    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>                           
                    <td  class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id'], null, __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
