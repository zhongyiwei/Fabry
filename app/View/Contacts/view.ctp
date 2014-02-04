<div class="actions">

</div>
<div class="actions">
    <ul>
        <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super') : ?> 
            <li><?php echo $this->Html->link(__('Go Back'), array('controller' => 'contacts', 'action' => 'index')); ?></a></li>
        <?php elseif ($current_user['role'] == 'member'): ?>
            <li><?php echo $this->Html->link(__('Go Back'), array('controller' => 'contacts', 'action' => 'memindex')); ?></a></li>
        <?php endif; ?>
        <?php if ($current_user['role'] == 'admin'): { ?>

                <li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete ' . $contact['Contact']['doctor'] . 'from the official list ?')); ?> </li>
                <li><?php echo $this->Html->link(__('New Contact'), array('action' => 'admadd')); ?> </li>

                <?php
            } elseif ($current_user['role'] == 'member' && $contact['Contact']['isOfficial'] != 1): {
                $users_id = $current_user['id'];
                ?>

                <li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete ' . $contact['Contact']['doctor'] . 'from the list ?')); ?> </li>
                <li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>

            <?php
            }
        endif;
        ?>
    </ul>

</div>




<div class="contacts view">
    <h2><?php echo __('Contact'); ?></h2>
    <dl>
        </dd>
        <dt><?php echo __('Center Name'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['centerName']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Doctor'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['doctor']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Department'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['department']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Suburb'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['suburb']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Postal', array('label' => 'Postcode')); ?></dt>
        <dd>
<?php echo h($contact['Contact']['postal']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('State'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['state']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Country'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['country']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['phone']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fax'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['fax']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
<?php echo h($contact['Contact']['email']); ?>
            &nbsp;
        </dd>
        <?php if ($current_user['role'] == 'admin'): ?>
            <?php /* <dt><?php echo __('Users'); ?></dt>
              <dd>
              <?php echo $this->Html->link($contact['Users']['id'], array('controller' => 'users', 'action' => 'view', $contact['Users']['id'])); ?>
              &nbsp;
              </dd> */ ?>
        <?php endif;
        ?>
    </dl>
</div>

