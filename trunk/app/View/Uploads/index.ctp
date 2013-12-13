<div class="uploads index">
    <h2><?php echo __('Uploads'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>File Name</th>
                <th>Created</th>

                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uploads as $upload): ?>
                <tr>

                    <td><?php echo h($upload['Upload']['title']); ?>&nbsp;</td>
                    <td><?php echo h($upload['Upload']['description']); ?>&nbsp;</td>
                    <td><?php echo h($upload['Upload']['filename']); ?>&nbsp;</td>
                    <td><?php
                        $timestamp = strtotime($upload['Upload']['created']);
                        echo date('d-m-Y', $timestamp);
                        ?>



                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $upload['Upload']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $upload['Upload']['id'])); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $upload['Upload']['id']), null, __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
