<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<?php if ($current_user ['role'] == 'admin' || $current_user['role'] == 'member'): ?>		
    <?php // this if statement used to control the content will be displayed to user (Only the members and admin can see the "List Users" button).     ?>
    <div class="actions">
        <ul>

            <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        </ul>
    </div>

<?php endif; ?>


<div class="usersform">
    <?php echo $this->Form->create('User', array('novalidate' => true)); ?>
    <fieldset>
        <h3 style="color:#f00;"><?php echo "*Mandatory Fields"; ?></h3>

        <table width="200" border="0" class="userTable">
            <tr>
                <td>       

                    <h2 class="title"><span class="underline"><?php echo "Personal Information"; ?></span></h2>
                    <?php
                    echo $this->Form->input('firstName');
                    echo $this->Form->input('lastName');
                    echo $this->Form->input('dob', array('id' => 'dob', 'type' => 'text'));
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
                        echo $this->Form->input('password');
                        echo $this->Form->input('password1', array('label' => 'Confirm Password', 'type' => 'password'));
                        if ($current_user['role'] == 'super'):
                            echo $this->Form->input('role', array('label' => 'Define the role', 'options' => array('member' => 'Member', 'admin' => 'Admin')));
                        endif;
                        echo $this->Form->input('dateOfDiagnosis', array('id' => 'dateOfDiagnosis', 'type' => 'text'));
//                        echo $this->Form->input('dateOfDiagnosis', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 120, 'maxYear' => date('Y') - 0));
                        //echo $this->Form->year('dateOfDiagnosis', date('Y') - 100, date('Y') - 13, array('empty' => "YEAR"));
                        //echo $this->Form->month('dateOfDiagnosis', array('empty' => "MONTH"));
                        //echo $this->Form->day('dateOfDiagnosis', array('empty' => 'DAY'));
                        echo $this->Form->input('doctor');
                        echo $this->Form->input('hospital');
                        echo $this->Form->input('treatment', array('label' => 'Are you receiving any treatment ?', 'options' => array(NULL => 'Select ...', 'yes' => 'yes', 'no' => 'no')));
                        echo $this->Form->input('treatmentType', array('options' => array(NULL => 'Select ...', 'Fabrazme' => 'Fabrazme', 'Replagal' => 'Replagal', 'Amigal' => 'Amigal')));
                        echo $this->Form->input('membershipType', array('options' => array(null => 'select...', 'Family / Individual (Australia) - $20' => 'Family / Individual (Australia) - $20', 'Family / Individual (Overseas) - $26' => 'Family / Individual (Overseas) - $26', 'Organisation (Australia) - $40' => 'Organisation (Australia) - $40', 'Organisation (Overseas) - $46' => 'Organisation (Overseas) - $46')));
                        echo $this->Form->input('fabryStatus', array('options' => array(null => 'select...', 'Male' => 'Male', 'Female' => 'Female', 'Child' => 'Child', 'Doctor' => 'Doctor', 'Researcher' => 'Researcher', 'Other' => 'Other')));
                        ?>


                </td>
            </tr>
        </table>



    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>

</div>

<script type="text/javascript">
    $('#dob').datepicker({dateFormat: 'dd-mm-yy',  maxDate: '+0d'});
    $('#dateOfDiagnosis').datepicker({dateFormat: 'dd-mm-yy',  maxDate: '+0d'});
</script>
