<div class="events index">
    <h2><?php echo __('Appointments'); ?></h2>

    <div class="actions">

        <ul>
            <li><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add')); ?></li>
        </ul>
    </div>

    <table cellpadding="0" cellspacing="0" id="js-datatable">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('date'); ?></th>
                <th><?php echo $this->Paginator->sort('time'); ?></th>
                <th><?php echo $this->Paginator->sort('contact'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>

                    <?php
                    //$timestamp = strtotime($appointment['Appointment']['date']); echo date('d-m-Y H:i:s', $timestamp);
                    /*
                     * Elisha
                     * date is already speparated to date and time int the controller, so just use it like below
                     */
                    ?>

                    <td>
                        <?php echo h($appointment[0]['date']); ?>
                    </td>

                    <td>
                        <?php echo h($appointment[0]['time']); ?>
                    </td>	

                    <td><?php echo h($appointment['Contact']['doctor']); ?>&nbsp;</td>
                    <td><?php echo h($appointment['Appointment']['description']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $appointment['Appointment']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appointment['Appointment']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appointment['Appointment']['id']), null, __('Are you sure you want to delete your Appointment with ' . $appointment['Contact']['doctor'] . '?', $appointment['Appointment']['id'])); ?>
                    </td>
                </tr>
            <?php
            endforeach;

//debug($current_user);
            ?>
        </tbody>
    </table>
    <p>
        <?php ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>

