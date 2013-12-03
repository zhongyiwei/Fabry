<?php
// in your view file
$this->Html->css('fabry', null, array('inline' => false));
?>



<div>

    <?php echo $this->Session->flash(); ?>

    <?php echo $this->Form->create('User', array('novalidate' => true)); ?>

    <table width="400" border="0" style="margin-bottom: 90px; margin-top:50px;">

	<br/>

	<br/>

	<br/>

	<br/>

        <tr>

            <center><span style="font-weight:normal; color:green; font-size:25px;">

            <?php echo __('Please enter your email address below: '); ?></span></center>

        </tr>

        <tr>

            <td colspan="2"> <span style="font-weight:normal; color:green; font-size:17px;">

            <center><?php echo __('* A temporary password will be emailed to you * '); ?></center></span>

			</td>

        </tr>

<br/>

<br/>

        <tr>

            <td width="650px"><?php echo $this->Form->input('forget', array('label' => false, 'style' => 'margin-left: 180px; width:400px;'));?></td>

            <td>

                <?php

                $options = array(

                    'label' => 'Submit',

                    'div' => array(

                        'class' => 'submit',

                        'style' => 'margin-top:0px;',

                       

                    )

                );

                echo $this->Form->end($options);?>

            </td>

        </tr>

    </table>

</div>



