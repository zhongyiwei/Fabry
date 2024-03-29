<?php echo $this->Session->flash(); ?>
<div class="users index">
    <h2><?php echo __('Users'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('password'); ?></th>
            <th><?php echo $this->Paginator->sort('role'); ?></th>
            <th><?php echo $this->Paginator->sort('firstName'); ?></th>
            <th><?php echo $this->Paginator->sort('lastName'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('phone'); ?></th>
            <th><?php echo $this->Paginator->sort('dateOfDiagnosis'); ?></th>
            <th><?php echo $this->Paginator->sort('doctor'); ?></th>
            <th><?php echo $this->Paginator->sort('hospital'); ?></th>
            <th><?php echo $this->Paginator->sort('treatment'); ?></th>
            <th><?php echo $this->Paginator->sort('treatmentType'); ?></th>
            <th><?php echo $this->Paginator->sort('membershipType'); ?></th>
            <th><?php echo $this->Paginator->sort('dob'); ?></th>
            <th><?php echo $this->Paginator->sort('fabryStatus'); ?></th>
            <th><?php echo $this->Paginator->sort('address'); ?></th>
            <th><?php echo $this->Paginator->sort('suburb'); ?></th>
            <th><?php echo $this->Paginator->sort('postal'); ?></th>
            <th><?php echo $this->Paginator->sort('state'); ?></th>
            <th><?php echo $this->Paginator->sort('country'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['firstName']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['lastName']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['dateOfDiagnosis']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['doctor']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['hospital']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['treatment']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['treatmentType']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['membershipType']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['dob']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['fabryStatus']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['address']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['suburb']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['postal']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['state']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['country']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
    </ul>
</div>
