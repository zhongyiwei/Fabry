<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Fabry support group Australia');
$this->Html->image('cake.logo.png');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        /* THE CSS AND LAYLOUT DEFAULT SETTINGS ARE HERE, THE CSS THAT USED IN THIS WEBSITE IS IN THE FOLDER WEBROOT/CSS  */
        echo $this->Html->meta('logo');
        echo $this->Html->css('fabry');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        echo $this->Html->script('jquery-1.10.2.min.js');
        echo $this->Html->script('jquery.dataTables.min.js');
        echo $this->Html->css('jquery.dataTables.css');
        ?>

    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
                <div id="signIn">

                    <?php
                    /* <!-- IF YOU LOGIN, A WELCOME MESSAGE WILL DISPLAY AND GO TO THE HOMEPAGE VIEW, AND A LOGOUT BUTTON WILL ALSO DISPLAY ON TOP RIGHT --> */
                    if ($logged_in):
                        ?>
                        Welcome <?php echo $current_user['username']; ?>. <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>

                        <?php
                    /* IF YOU DO NOT LOGIN, TWO BUTTONS OF LOGIN AND REGISTER WILL DISPLAY ON TOP RIGHT */
                    else:
                        ?>
                        <?php echo $this->Html->link('Login |', array('controller' => 'users', 'action' => 'login')); ?>
                        <?php echo $this->Html->link(' New member?Register', array('controller' => 'users', 'action' => 'add')); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php /*
              The code below is to set the right menu item for the right user role. eg: member user
             */ ?>



            <div class = "navigation">
                <?php if ($current_user['role'] == 'super'): ?>

                    <nav>
                        <ul>
                            <li><?php echo $this->Html->link('Home', '/pages/home'); ?></a></li>
                            <li><?php echo $this->Html->link('Manage Accounts', array('controller' => 'users', 'action' => 'index')); ?></a></li>
                        </ul>
                    </nav>



                <?php elseif ($current_user['role'] == 'admin'): ?>

                    <nav>
                        <ul>
                            <li><?php echo $this->Html->link('Home', '/pages/home'); ?></a></li>
                            <li><?php echo $this->Html->link('Members Management', array('controller' => 'users', 'action' => 'index')); ?></a>
                                <ul>
                                    <li><?php echo $this->Html->link('View Accounts', array('controller' => 'users', 'action' => 'index')); ?></a>
                                    <li><?php echo $this->Html->link('Non-Active Accounts Report', '/users/loginReport'); ?></a></li>
                                </ul>
                            </li>

                            <li><?php echo $this->Html->link('Doctors and Centres Management', '/contacts'); ?></a></li>
                            <li><?php echo $this->Html->link('Events', '/events'); ?></a>
                                <ul>
                                    <li><?php echo $this->Html->link('Manage Event', '/events'); ?></a></li>
                                    <li><?php echo $this->Html->link('View in Calendar', '/calendarEvents/calendarEvent'); ?></a></li>
                                </ul>
                                <!--   <ul>   
                                           <li><?php echo $this->Html->link('View RSVP', '/addressbooks'); ?></a></li>
                                       </ul>    -->
                            </li>
                            <li><?php echo $this->Html->link('Newsletters', '/news'); ?></a></li>
                            <!-- <li><?php echo $this->Html->link('Health Tips And Videos', '/addressbooks'); ?></a></li> -->
                            <li><?php echo $this->Html->link('Email Templates', '/templates'); ?></a></li>
                        </ul>
                    </nav>



                    <?php
                elseif ($current_user['role'] == 'member'):
                    $users_id = $current_user['id'];
                    ?>

                    <nav>
                        <ul>
                            <li><?php echo $this->Html->link('Home', '/pages/home'); ?></a></li>
                            <li><?php echo $this->Html->link('Address Book', "/contacts/memindex"); ?></a>
                                <ul>
                                    <li><?php echo $this->Html->link('List Personal Contacts', array('controller' => 'contacts', 'action' => 'memindex')); ?></a></li>
                                    
                                    <li><?php echo $this->Html->link('Official Treatment Centres', array('controller' => 'contacts', 'action' => 'index')); ?></a></li>
                                    <li><?php echo $this->Html->link('New Personal Contact', array('controller' => 'contacts', 'action' => "add?redirect=add")); ?></a></li>
                                    <!--<li><?php echo $this->Html->link('Learn More', '/contacts'); ?></a></li>-->
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('Medical Records', ''); ?></a>
                                <ul>
                                    <li><?php echo $this->Html->link('Exercise Chart', '/exercises'); ?></a></li>
                                    <li><?php echo $this->Html->link('Bowel Movement Chart', '/bowels'); ?></a></li>
                                    <li><?php echo $this->Html->link('Pain Chart', '/pains'); ?></a></li>
                                    <li><?php echo $this->Html->link('Medication Chart', '/medications'); ?></a></li>
                                    <li><?php echo $this->Html->link('External Medical Records', '/uploads'); ?></a></li>
                                    <li><?php echo $this->Html->link('Email GP', '/PDF/emailPdfs'); ?></a></li>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('Events/Appointments', '/calendarEvents/calendarEvent'); ?></a>
                                <ul>
                                    <li><?php echo $this->Html->link('View Calendar', '/calendarEvents/calendarEvent'); ?></a>
                                    <li><?php echo $this->Html->link('My Events', '/calendarEvents/index'); ?></a>
                                    <li><?php echo $this->Html->link('My Appointments', '/appointments'); ?></a>
                                    <li><?php echo $this->Html->link('FSGA Events', '/invitations/eventParticipation'); ?></a>
                                <!--                                <ul>
                                                                    <li><?php echo $this->Html->link('RSVP', '/addressbooks'); ?></a></li>
                                                                    <li><?php echo $this->Html->link('Remainder to make booking', '/addressbooks'); ?></a></li>
                                                                    <li><?php echo $this->Html->link('Remainder to attend appointment/ take medication', '/addressbooks'); ?></a></li>
                                
                                                                </ul>-->
                            </li>
                                        <ul>
                                            <li><?php echo $this->Html->link('List All Appointments', '/appointments'); ?></a></li>
                                            <li><?php echo $this->Html->link('New Appointment', '/appointments/add?redirect=normal'); ?></a></li>
                                            <li><?php echo $this->Html->link('Remainder to attend appointment/ take medication', '/addressbooks'); ?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <li><?php echo $this->Html->link('Profile Update', array('controller' => 'users', 'action' => "view/$users_id")); ?></a></li>




                        </ul>
                    </nav>

                <?php endif; ?>
            </div>



            <div id="content">

                <!-- for good /bad flash message colors --> 
                <?php echo $this->Session->flash('good'); ?>
                <?php echo $this->Session->flash('bad'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                <?php /* Designed by Team 71 Infinity :) Tefo */ ?>
                <h1>Copyright &copy; Fabry Support Group Australia, All Rights Reserved.</h1>

                </h2>

            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#js-datatable').dataTable({
                    "aaSorting": [[0, "desc"]]
                });
                document.getElementById('showTable').style.display = 'block';
            });
        </script>
    </body>
</html>
