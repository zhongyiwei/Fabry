<div class="login">
<h2>Login</h2>

    
<?php
echo $this->Form->create( array('novalidate' => true));
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Html->link('Forgot Password', array('action'=>'forgotpassword'));
echo $this->Form->end('Login');
?>



</div>
