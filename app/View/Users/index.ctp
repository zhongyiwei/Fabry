<?php
echo $this->Html->script('jquery.dataTables.min.js');
echo $this->Html->css('jquery.dataTables.css');
?>
<div class="users index">
	<h2><?php echo __('Members'); ?></h2>
	<div class="actions"> 
		<ul class="actions">
			<?php if ($current_user['role'] != 'member'):?>
			<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<?php endif; ?>
		</ul>
	</div>
	
	<table cellpadding="0" cellspacing="0" id="js-datatable">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
	
		<?php if ( $current_user['role'] == 'admin' ){?>
					<?php if ($user['User']['role'] != 'super'):?>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
					
		<td class="actions">
		    <?php if ($user['User']['role']=='admin'):?>
			<?php if ($user['User']['id']==$current_user['id']) {?>
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>

			<?php }else{
				echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); 
				}
			?>
			<?php endif?>
			
			<?php if ($user['User']['role']=='member'):?>
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$user['User']['id']), null, __('Are you sure you want to delete '.$user['User']['username']. '?', $user['User']['id']));?>

	
			<?php endif?>
			
			
			
			
			<?php endif; ?>
			<?php }else{ ?>
			<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
					<td class="actions">
			<?php if ($user['User']['role']==$current_user['role']){ ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			
			<?php }else{ ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$user['User']['id'], null, __('Are you sure you want to delete # %s?', $user['User']['id'])));?>
			<?php } ?>
			<?php } ?>
			<?php 
			//restrict action delete of admin users
			//if current user is admin and the user in selected row is not an admin then print delete button
			//if($user['User']['role'] != 'admin' || $user['User']['role'] != 'super'):
				?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	
</div>
