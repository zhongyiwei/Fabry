<?php
echo $this->Html->css('jquery-ui.css');
echo $this->Html->css('jquery-ui-timepicker-addon.css');
echo $this->Html->script('jquery-1.10.2.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('jquery.ui.slider.js');
echo $this->Html->script('jquery.ui.datepicker.js');
echo $this->Html->script('jquery-ui-timepicker-addon.js');
?>


<script type="text/javascript">
    $(document).ready(function() {

        $('#count').keypress(function(key) {
            if (key.charCode < 48 || key.charCode > 57)
                return false;
        });

        $('#count').keyup(function() {
            //limit the value to between 0 and 100
            var thisVal = parseInt($(this).val(), 7);
            if (!isNaN(thisVal)) {
                thisVal = Math.max(0, Math.min(6, thisVal));
                $(this).val(thisVal);
            }
        });
    });
</script>


<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bowel.id')), null, __('Are you sure you want to delete your bowel movement entry on ' . date('d-m-Y', strtotime($this->Form->value('Bowel.date'))) . '?')); ?></li>
        <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
    </ul>
</div>

<div class="bowels form">
<?php echo $this->Form->create('Bowel', array('novalidate' => true)); ?>
    <fieldset>
        <legend><?php echo __('Edit Bowel Movement Entry'); ?></legend>
        <?php
        echo $this->Form->input('id');
//        echo $this->Form->input('date', array('dateFormat' => 'DMY'));
        echo $this->Form2->input('Bowel.date', array('id' => 'datePickerStart', 'type' => 'text'));
        echo $this->Form->input('count', array('id' => 'count', 'label' => 'Count (on scale of 0-6)', 'min' => 0, 'max' => 6));
        echo $this->Form->input('comment');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
    $('#datePickerStart').datepicker({dateFormat: 'dd-mm-yy'});
    $('#datePickerEnd').datepicker({dateFormat: 'dd-mm-yy'});

    function changeContent() {
        if ($('#checkbox').prop('checked')) {
            $('#datePickerEnd').hide();
        } else {
            $('#datePickerEnd').show();
        }
    }
    ;

    $(document).ready(function() {
        var formattedDate = new Date($('#datePickerStart').val());
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11

//        var hour = formattedDate.getHours();
//        var minute = formattedDate.getMinutes();

        var y = formattedDate.getFullYear();
        if (d.toString().length < 2) {
            d = "0" + d;
        }
        if (m.toString().length < 2) {
            m = "0" + m;
        }
//        if (hour.toString().length < 2) {
//            hour = "0" + hour;
//        }
//
//        if (minute.toString().length < 2) {
//            minute = "0" + minute;
//        }

//        $("#datePickerStart").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);
        $("#datePickerStart").val(d + "-" + m + "-" + y);

//        var formattedDate = new Date($('#datePickerEnd').val());
//        var d = formattedDate.getDate();
//        var m = formattedDate.getMonth();
//        m += 1;  // JavaScript months are 0-11
//
//        var hour = formattedDate.getHours();
//        var minute = formattedDate.getMinutes();
//
//        var y = formattedDate.getFullYear();

//        if (hour.toString().length < 2) {
//            hour = "0" + hour;
//        }
//
//        if (minute.toString().length < 2) {
//            minute = "0" + minute;
//        }

//        $("#datePickerEnd").val(d + "-" + m + "-" + y + " " + hour + ":" + minute);

    });
</script>