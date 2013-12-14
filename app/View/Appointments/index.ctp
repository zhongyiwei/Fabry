<?php echo $this->Session->flash(); ?>
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
                <th>Date</th>
<!--                <th>Time</th>-->
                <th>Contact</th>
                <th>Description</th>
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
                    $start = date('Y-m-d G:i', strtotime($appointment['Appointment']['date']));
                    ?>

                    <td>
                        <?php echo h($start); ?>
                    </td>

    <!--                    <td>
                    <?php // echo h($appointment['Appointment']['time']); ?>
                        </td>	-->

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

</div>

