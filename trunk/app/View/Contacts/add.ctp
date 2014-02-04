<?php echo $this->Session->flash(); ?>
<div class="actions">
    <ul>
        <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'super') : ?> 
            <li><?php echo $this->Html->link(__('Go Back'), array('controller' => 'contacts', 'action' => 'index')); ?></a></li>
        <?php elseif ($current_user['role'] == 'member'): ?>
            <li><?php echo $this->Html->link(__('Go Back'), array('controller' => 'contacts', 'action' => 'memindex')); ?></a></li>
        <?php endif; ?>
    </ul>

</div>




<div class="contacts form">
    <?php echo $this->Form->create('Contact', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Add Personal Contact'); ?></legend>

        <table width="200" border="0" class="userTable">
            <tr>
                <td><?php
                    echo $this->Form->input('centerName');
                    echo $this->Form->input('doctor');
                    echo $this->Form->input('department');
                    echo $this->Form->input('address');
                    echo $this->Form->input('suburb');
                    echo $this->Form->input('postal', array('label' => 'Post code'));
                    ?></td>
                <td><?php
                    echo $this->Form->input('state');
                    echo $this->Form->input('country');
                    echo $this->Form->input('phone');
                    echo $this->Form->input('fax');
                    echo $this->Form->input('email');
                    ?></td>
            </tr>
        </table>
        <?php
        if (($current_user['role'] == 'admin' ) || ($current_user['role'] == 'super' )):
            echo $this->Form->input('isOfficial');
            //$current_contacts['isOfficial'] == 1;
            echo $this->Form->input('users_id', array('label' => 'User ID', 'options' => array('2' => '2', '3' => '3')));
        elseif ($current_user['role'] == 'member'):
        //$current_user_id
        endif;
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
