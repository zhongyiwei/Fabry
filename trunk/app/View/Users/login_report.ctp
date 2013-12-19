<?php
echo $this->Html->script('jquery.dataTables.min.js');
echo $this->Html->css('jquery.dataTables.css');
?>
<?php echo $this->Session->flash(); ?>
<div class="users index">
    <h2><?php echo __('Accounts have not login for more than 2 years'); ?></h2>


    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Last Login</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Email</th>
                
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['lastLogin']); ?>&nbsp;</td> 
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['firstName'].$user['User']['lastName']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    
                    
                    <td  class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                           <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'deleteR', $user['User']['id'], null, __('Are you sure you want to delete this user?'))); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete ' . $user['User']['username'] . '?', $user['User']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
