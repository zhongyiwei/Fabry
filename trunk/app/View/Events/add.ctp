<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
    </ul>
</div>

<?php echo $this->Session->flash(); ?>
<table>
    <tr><td>
            <div class="events form">
                <?php echo $this->Form->create('Event', array('novalidate' => true)); ?>
                <fieldset>
                    <legend><?php echo __('Add Event'); ?></legend>
                    <?php
                    echo $this->Form->input('title');
                    echo $this->Form->input('description', array('id' => 'description'));
                    echo $this->Form->input('start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
                    echo $this->Form->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
                    echo $this->Form->input('allDay');
                    ?>
                    <!--        <h3>Invitation send to: </h3>-->
                    <?php
//        debug($userName);
//        echo $this->Form->select('users', $userName, array(
//            'multiple' => 'checkbox'
//        ));
//        echo $this->Form->checkbox('users', array($userName));
                    ?>
                </fieldset>
                <?php echo $this->Form->end(__('Save')); ?>
            </div>
        </td>
        <td>
            <div>
                <h3>Click to Choose templates below: </h3>
                <?php
                for ($i = 0; $i < count($templates); $i++) {
                    echo "<div class='templateTitle' onclick='changeContent(" . $i . ")'>" . $templates[$i]['Template']['title'] . "</div>";
                    echo "<div class='tempContent' id='temp" . $i . "'>" . $templates[$i]['Template']['content'] . "</div>";
                }
                ?>
            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    $('#dateTimePickerStart').datetimepicker({dateFormat: 'dd-mm-yy'});
    $('#dateTimePickerEnd').datetimepicker({dateFormat: 'dd-mm-yy'});

    function changeContent(index) {
        var id = "#temp" + index;
        $("#description").val($(id).text());
    }
//    $(document).ready(function() {
//
//    });
</script>