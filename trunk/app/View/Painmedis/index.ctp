<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
<!--            <li><?php echo $this->Html->link(__('New Painmedi'), array('action' => 'add')); ?></li>-->
        <li><?php echo $this->Html->link(__('List Pains'), array('controller' => 'pains', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Pains'), array('controller' => 'pains', 'action' => 'add')); ?> </li>
<!--            <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
        <li><?php echo $this->Html->link(__('List Medications'), array('controller' => 'medications', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Medications'), array('controller' => 'medications', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="painmedis index">
    <h2><?php echo __('Pain with Medicine'); ?></h2>
    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th>Pain</th>
                <th>Medication</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($painmedis as $painmedi): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($painmedi['Pains']['date'], array('controller' => 'pains', 'action' => 'view', $painmedi['Pains']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($painmedi['Medications']['medicationName'], array('controller' => 'medications', 'action' => 'view', $painmedi['Medications']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php // echo $this->Html->link(__('View'), array('action' => 'view', $painmedi['Painmedi']['id'])); ?>
                        <?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $painmedi['Painmedi']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $painmedi['Painmedi']['id']), null, __('Are you sure you want to delete # %s?', $painmedi['Painmedi']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

