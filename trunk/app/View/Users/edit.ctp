<div class="actions">

    <ul>
        <?php if ($current_user['role'] == 'super'): ?>									
            <?php // this if statement used to control the content will be displayed to user (The member can not delete any user account while the admin allow to delete members' account).  ?>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete this user?', $this->Form->value('User.id'))); ?></li>

            <li><?php echo $this->Html->link(__('Members profile '), array('action' => 'index')); ?></li>

        <?php endif; ?>
        <?php if ($current_user['role'] == 'admin'): ?>									
            <?php // this if statement used to control the content will be displayed to user (The member can not delete any user account while the admin allow to delete members' account).  ?>


            <li><?php echo $this->Html->link(__('Members profile '), array('action' => 'index')); ?></li>

        <?php endif; ?>
        <?php
        if ($current_user['role'] == 'member'):
            $userId = $current_user['id'];
            ?>
            <li><?php echo $this->Html->link(__('Members profile '), array('controller' => 'users', 'action' => "view/$userId")); ?></li>
        <?php endif; ?>
    </ul>
</div>

<div class="users form">
    <?php echo $this->Form->create('User', array('novalidate' => true)); ?>
    <fieldset>

        <?php
        if ($current_user['role'] == 'member'):
            $userId = $current_user['id'];
            ?>

        <!--            <h3><?php echo __('Profile of '), h($current_user['username']); ?></h3>-->
            <!--<dd>
                    <h3><?php // echo h($current_user['username']);   ?></h3>
                    &nbsp;
            </dd>-->
        <?php endif; ?>
        <?php
        //echo $this->Form->input('password');
        //echo $this->Form->input('password_confirmation', array('type'=>'password'));

        echo $this->Form->username;
        if ($current_user['role'] == 'super'): /* this if statement used to control the content will be displayed to user (Only the admin allow to change the role of any members). */

            echo $this->Form->input('role', array('label' => 'Define the role', 'options' => array('member' => 'Member', 'admin' => 'Admin')));
        endif;
        ?>
        <table width="200" border="0" class="userTable">
            <tr>
                <td>		  
                    <h2 class="title"><span class="underline"><?php echo "Personal Information"; ?></span></h2>
                    <h3 style="color:#f00;"><?php echo "*Mandatory Fields"; ?></h3>

                    <?php
                    echo $this->Form->input('firstName');
                    echo $this->Form->input('lastName');
                    echo $this->Form->input('dob', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 120, 'maxYear' => date('Y') - 0));
                    echo $this->Form->input('address');
                    echo $this->Form->input('suburb');
                    echo $this->Form->input('postal', array('label' => 'Post Code'));
                    echo $this->Form->input('state');
                    echo $this->Form->input('country');
                    echo $this->Form->input('email');
                    echo $this->Form->input('phone');
                    ?>
                </td>
                <td>
                    <h2 class="title"><span class="underline"><?php echo "Membership details"; ?></span></h2>

                    <?php
                    echo $this->Form->input('username');
                    if ($current_user['role'] == 'super'):
                        echo $this->Form->input('role', array('label' => 'Define the role', 'options' => array('member' => 'Member', 'admin' => 'Admin')));
                    endif;

                    echo $this->Form->input('dateOfDiagnosis', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 120, 'maxYear' => date('Y') - 0));
                    //echo $this->Form->year('dateOfDiagnosis', date('Y') - 100, date('Y') - 13, array('empty' => "YEAR"));
                    //echo $this->Form->month('dateOfDiagnosis', array('empty' => "MONTH"));
                    //echo $this->Form->day('dateOfDiagnosis', array('empty' => 'DAY'));
                    echo $this->Form->input('doctor');
                    echo $this->Form->input('hospital');
                    echo $this->Form->input('treatment', array('label' => 'Are you reciving any treatment ?', 'options' => array(NULL => 'Select ...', 'yes' => 'yes', 'no' => 'no')));
                    echo $this->Form->input('treatmentType', array('options' => array(NULL => 'Select ...', 'Fabrazme' => 'Fabrazme', 'Replagal' => 'Replagal', 'Amigal' => 'Amigal')));
                    echo $this->Form->input('membershipType', array('options' => array(null => 'select...', 'Family / Individual (Australia) - $20' => 'Family / Individual (Australia) - $20', 'Family / Individual (Overseas) - $26' => 'Family / Individual (Overseas) - $26', 'Organisation (Australia) - $40' => 'Organisation (Australia) - $40', 'Organisation (Overseas) - $46' => 'Organisation (Overseas) - $46')));
                    echo $this->Form->input('fabryStatus', array('options' => array(null => 'select...', 'Male' => 'Male', 'Female' => 'Female', 'Child' => 'Child', 'Doctor' => 'Doctor', 'Researcher' => 'Researcher', 'Other' => 'Other')));
                    ?>

                </td>
            </tr>
        </table>


    </fieldset>

    <?php
    if ($current_user['role'] == 'super'):
        $userId = $current_user['id'];
        ?>	
        <?php echo $this->Form->end(__('Submit'), array('controller' => 'users', 'action' => 'index')); ?>

    <?php endif; ?>
    <?php
    if ($current_user['role'] == 'admin'):
        $userId = $current_user['id'];
        ?>	
        <?php echo $this->Form->end(__('Submit'), array('controller' => 'users', 'action' => 'index')); ?>

    <?php endif; ?>
    <?php
    if ($current_user['role'] == 'member'):
        $userId = $current_user['id'];
        ?>
        <?php echo $this->Form->end(__('Submit'), array('controller' => 'users', 'action' => "view/$userId")); ?>
    <?php endif; ?>

</div>

