
<?php /*
  <div class="contacts index">
  <h2><?php echo __('Contacts'); ?></h2>
  <table cellpadding="0" cellspacing="0">
  <?php if ($current_user['role']== 'admin'):?>
  <tr>
  <th><?php echo $this->Paginator->sort('centerName'); ?></th>
  <th><?php echo $this->Paginator->sort('doctor'); ?></th>
  <th><?php echo $this->Paginator->sort('state'); ?></th>
  <th><?php echo $this->Paginator->sort('country'); ?></th>
  <th><?php echo $this->Paginator->sort('phone'); ?></th>
  <th><?php echo $this->Paginator->sort('users_id'); ?></th>
  <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php elseif ($current_user['role']== 'member'):  ?>
  <tr>
  <th><?php echo $this->Paginator->sort('centerName'); ?></th>
  <th><?php echo $this->Paginator->sort('doctor'); ?></th>
  <th><?php echo $this->Paginator->sort('state'); ?></th>
  <th><?php echo $this->Paginator->sort('country'); ?></th>
  <th><?php echo $this->Paginator->sort('phone'); ?></th>
  <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>


  <?php if ($contact['Contact']['isOfficial'] != 1): ?>
  <?php foreach ($contacts as $contact ): ?>
  <tr>
  <td><?php echo h($contact['Contact']['centerName']); ?>&nbsp;</td>
  <td><?php echo h($contact['Contact']['doctor']); ?>&nbsp;</td>
  <td><?php echo h($contact['Contact']['state']); ?>&nbsp;</td>
  <td><?php echo h($contact['Contact']['country']); ?>&nbsp;</td>
  <td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>
  <td>
  <?php
  if ($current_user['role']== 'admin'):
  echo $this->Html->link($contact['Users']['id'], array('controller' => 'users', 'action' => 'view', $contact['Users']['id']));
  ?>
  </td>
  </tr>

  <td class="actions">
  <?php
  if ($current_user['role']== 'admin'): ?>
  <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
  <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id'])); ?>
  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>

  <?php elseif ($current_user['role']== 'member'): ?>
  <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
  <?php endif; ?>
  </td>

  </table>
  <div class="paging">
  <?php
  echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
  echo $this->Paginator->numbers(array('separator' => ''));
  echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
  </div>
  </div>
  <div class="actions">



  if ($current_user['role']== 'admin'): ?>
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
  <li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts','action' => 'add')); ?></li>
  </ul>
  <?php endif; ?>
  </div>

 */ ?>

<div class="contacts index">

    <h2><?php echo __('Official Contacts'); ?></h2>

    <div class="actions">



        <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super'): ?>
            <ul>
                <li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'admadd')); ?></li>
            </ul>
        <?php endif ?>
    </div>


    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <?php // admin page dispaly all official contacts and member's contacts, but only diplay official cotacts in member's page?>
            <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super'): ?>
                <tr>
                    <th>Centre Name</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            <?php elseif ($current_user['role'] == 'member') : ?>
                <tr>
                    <th>Centre Name</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            <?php endif ?>
        </thead>
        <tbody>





            <?php foreach ($contacts as $contact): ?>

                <?php if (($current_user['role'] == 'admin' || $current_user['role'] == 'super') && ($contact['Contact']['isOfficial'] == 1)) : ?>
                    <tr>
                        <td><?php echo h($contact['Contact']['centerName']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['doctor']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['department']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['state']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['country']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>


                        <td class="actions">

                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
                            <?php if (($current_user['role'] == 'admin' || $current_user['role'] == 'super' ) && ($contact['Contact']['isOfficial'] == 1)): ?>

                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete  ' . $contact['Contact']['centerName'] . ' ?', $contact['Contact']['id'])); ?>

                            <?php elseif ($current_user['role'] == 'member'): ?>
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php elseif (($current_user['role'] == 'member') && $contact['Contact']['isOfficial'] == 1) : ?>
                    <tr>
                        <td><?php echo h($contact['Contact']['centerName']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['doctor']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['department']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['state']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['country']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super') : ?>   <?php // only admin could edit and delete contacts, member could only view ?>

                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete ' . $contact['Contact']['doctor'] . ' from the official list ?', $contact['Contact']['id'])); ?>

                            <?php elseif ($current_user['role'] == 'member'): ?>
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
                            <?php endif; ?>
                        </td>
                    </tr>


                <?php endif ?>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
