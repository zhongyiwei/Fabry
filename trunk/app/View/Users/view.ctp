<div class="actions">
    <ul>

        <?php if ($current_user['role'] == 'admin') { ?>

            <?php if ($user['User']['role'] == 'admin'): ?>
                <?php if ($user['User']['username'] == $current_user['username']) { ?>
                    <li><?php echo $this->Html->link(__('Update Entry'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                    <li><?php echo $this->Html->link(__('Change Password'), array('action' => 'password', $user['User']['id'])); ?> </li>
                    <li><?php echo $this->Html->link('Go Back', '/pages/home'); ?></a></li>
                <?php } else { ?>
                    <li><?php echo $this->Html->link('Go Back', '/pages/home'); ?></a></li>
                <?php }
                ?>
            <?php endif ?>

            <?php if ($user['User']['role'] == 'member'): ?>
                <li><?php echo $this->Html->link(__('Update Entry'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Change Password'), array('action' => 'password', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id'], null, __('Are you sure you want to delete # %s?', $user['User']['id']))); ?></li>
                <li><?php echo $this->Html->link('Go Back', '/pages/home'); ?></a></li>
            <?php endif ?>


        <?php }else if ($current_user['role'] == 'super') { ?>

            <?php if ($user['User']['role'] == $current_user['role']) { ?>

                <li><?php echo $this->Html->link(__('Change Password'), array('action' => 'password', $user['User']['id'])); ?> </li>		
                <li><?php echo $this->Html->link('Go Back', '/pages/home'); ?></a></li>
            <?php } else { ?>
                <li><?php echo $this->Html->link(__('Update Entry'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Change Password'), array('action' => 'password', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id'], null, __('Are you sure you want to delete # %s?', $user['User']['id']))); ?></li>
                <li><?php echo $this->Html->link('Go Back', '/pages/home'); ?></a></li>
            <?php } ?>
        <?php } else { ?>

            <?php if ($user['User']['id'] == $current_user['id']) : ?>
                <li><?php echo $this->Html->link(__('Update Entry'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Change Password'), array('action' => 'password', $user['User']['id'])); ?> </li>
            <?php endif ?>
        <?php } ?>

    </ul>
</div>
<div class="usersview">
    <?php if (($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin' || $current_user['role'] == 'super') && array_key_exists('username', $user['User'])): ?>	

        <?php // this if statement used to control the content will be displayed to user (The member can not view other members' information, while the admin allow to view all members' information, and super allow to view all users' information). ?>

        <dl>

            <dt><?php echo __('Username'); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
            <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super'): ?>
                <dt><?php echo __('Role'); ?></dt>
                <dd>
                    <?php echo h($user['User']['role']); ?>
                    &nbsp;
                </dd>
            <?php endif ?>
            <dt><?php echo __('First Name'); ?></dt>
            <dd>
                <?php echo h($user['User']['firstName']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Last Name'); ?></dt>
            <dd>
                <?php echo h($user['User']['lastName']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Date of Birth'); ?></dt>
            <dd>
                <?php
                $timestamp = strtotime($user['User']['dob']);
                echo date('d-m-Y', $timestamp);
                ?>			&nbsp;
            </dd>
            <dt><?php echo __('Street name / number'); ?></dt>
            <dd>
    <?php echo h($user['User']['address']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Suburb'); ?></dt>
            <dd>
    <?php echo h($user['User']['suburb']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Post code'); ?></dt>
            <dd>
    <?php echo h($user['User']['postal']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('State'); ?></dt>
            <dd>
    <?php echo h($user['User']['state']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Country'); ?></dt>
            <dd>
    <?php echo h($user['User']['country']); ?>
                &nbsp;
            </dd>
        </dl>
        <div id="userdetails">

            <dl>
                <dt><?php echo __('Email'); ?></dt>
                <dd>
    <?php echo h($user['User']['email']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Phone'); ?></dt>
                <dd>
    <?php echo h($user['User']['phone']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Date Of Diagnosis'); ?></dt>
                <dd>
                    <?php
                    $timestamp = strtotime($user['User']['dateOfDiagnosis']);
                    echo date('d-m-Y', $timestamp);
                    ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Doctor'); ?></dt>
                <dd>
    <?php echo h($user['User']['doctor']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Hospital'); ?></dt>
                <dd>
    <?php echo h($user['User']['hospital']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Treatment'); ?></dt>
                <dd>
    <?php echo h($user['User']['treatment']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Treatment Type'); ?></dt>
                <dd>
    <?php echo h($user['User']['treatmentType']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Membership Type'); ?></dt>
                <dd>
    <?php echo h($user['User']['membershipType']); ?>
                    &nbsp;
                </dd>

                <dt><?php echo __('Fabry Status'); ?></dt>
                <dd>
    <?php echo h($user['User']['fabryStatus']); ?>
                    &nbsp;
                </dd>
            </dl>
        <?php else: ?>
    <?php echo ('<center><h2>Sorry ! This page is not accessible :(</h2></center>'); ?>
<?php endif; ?>
    </div>
</div>

