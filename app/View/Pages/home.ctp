




<div class="home">                                                               
    <ul>
        <?php
        /* The homepage have different access for different users, here we use an if statement to control the different role
          the role is a attribute in user table */
        /* layouts for admin users, the admin user could manage members informations and all content of the website */
        if ($current_user['role'] == 'admin' || $current_user['role'] == 'super') {
            ?>

            <li><div class="navHome"> <?php echo $this->Html->image("Adressbook.png", array("class" => "icon", "alt" => "addressbook", 'url' => array('controller' => 'contacts'))); ?><p>Address Book</p></div> </li>
            <li><div class="navHome"> <?php echo $this->Html->image("profileUpdate.png", array("class" => "icon", "alt" => "manage users", 'url' => array('controller' => 'users'))); ?> <p>Profile Update</p></div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("videos.png", array("class" => "icon", "alt" => "health tips and videos", 'url' => array('controller' => 'videos'))); ?><p>Videos</p> </div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("event.png", array("class" => "icon", "alt" => "events", 'url' => array('controller' => 'appointments'))); ?> <p>Event</p></div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("reports.png", array("class" => "icon", "alt" => "genrate reports", 'url' => array('controller' => 'reports'))); ?> <p>Reports</p></div></li>

            <?php
        }
        /* layouts for member users, the members is able to manage their personal info, the following functions is under structuring :) */ else if ($current_user['role'] == 'member') {
            $userId = $current_user['id'];
            ?>
            <li><div class="navHome"> <?php echo $this->Html->image("Adressbook.png", array("class" => "icon", "alt" => "FSGA", 'url' => array('controller' => 'contacts'))); ?> <p>Address Book</p></div></li>
            <li><div class="navHome"> <?php
                    echo $this->Html->image("profileUpdate.png", array("class" => "icon", "alt" => "FSGA", 'url' => array('controller' => 'users', 'action' => "view/$userId")));
                    ;
                    ?><p>Profile Update</p> </div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("videos.png", array("class" => "icon", "alt" => "access health tips and vidoes", 'url' => array('controller' => 'videos'))); ?> <p>Videos</p> </div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("medicalRecord.png", array("class" => "icon", "alt" => "Manage Your Medical Records", 'url' => array('controller' => 'medicalrecords'))); ?> <p>Medical Record</p></div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("event.png", array("class" => "icon", "alt" => "remainders", 'url' => array('controller' => 'appointments'))); ?> <p>Event</p></div></li>
            <li><div class="navHome"> <?php echo $this->Html->image("emailUs.png", array("class" => "icon", "alt" => "Contact Fabry Support Group Australia", 'url' => array('controller' => 'contactus'))); ?> <p>Email Us</p></div></li>
<?php } ?>

    </ul>
</div>




