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
                    if (!empty($this->params['url']['date'])) {
                        $date = $this->params['url']['date'];
                    }
                    echo $this->Form->input('title', array('label' => 'Subject'));
                    echo $this->Form->input('description', array('id' => 'description'));
                    if (!empty($this->params['url']['date'])) {
                        echo $this->Form2->input('Event.start', array('id' => 'dateTimePickerStart', 'type' => 'text', 'value' => $date));
                    } else {
                        echo $this->Form2->input('Event.start', array('id' => 'dateTimePickerStart', 'type' => 'text'));
                    }
                    echo $this->Form->input('end', array('id' => 'dateTimePickerEnd', 'type' => 'text'));
//                    echo $this->Form2->input('frequency');
//                    echo $this->Form->input('allDay');
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
                <h3>Click to Choose From Templates: </h3>
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
    $(document).ready(function() {
        var formattedDate = new Date($('#dateTimePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

        var hour = formattedDate.getHours();
        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();

        if (d.toString().length < 2) {
            d = "0" + d;
        }

        if (m.toString().length < 2) {
            m = "0" + m;
        }
        var check = $('#dateTimePickerStart').val();
        if (check !== "") {
            $("#dateTimePickerStart").val(d + "-" + m + "-" + y);
        }
    });
</script>