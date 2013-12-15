<?php
echo $this->Html->script('ckfinder/ckfinder');
?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Back To List of News'), array('action' => 'index')); ?></li>
        
    </ul>
</div>
<div class="news form">
    <?php echo $this->Form->create('News', array('novalidate' => true)); ?>
    <fieldset>
    <legend><?php echo __('Create Newsletter Email'); ?></legend>
        <?php
//        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('news_title');
        echo $this->Form->input('news_description', array('id' => 'news_description'));
//        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
        //echo $this->Form->input('User');
        echo $this->Form->input('pdf_name', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px', 'label' => 'Browse for PDF file (double click to select)'));
        echo $this->Form->button('Browse PDF file', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:15px 5px;margin-top:-70px; margin-left:555px;float:left'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
//    var ck_newsContent = CKEDITOR.replace( 'news_description',{
//        filebrowserBrowseUrl : '<?php echo $pathForFinder ?>/js/ckfinder/ckfinder.html',
//        filebrowserWindowWidth : '600',
//        filebrowserWindowHeight : '300'
//    } ); 
//    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;
</script>


<!--div class="news form">
<?php echo $this->Form->create('News'); ?>
        <fieldset>
                <legend><?php echo __('Add News'); ?></legend>
<?php
echo $this->Form->input('news_title');
echo $this->Form->input('news_description');
echo $this->Form->input('User');
?>
        </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

-->

<script type="text/javascript">
    function BrowseServer()
    {
        var finder = new CKFinder();
        finder.basePath = '../';
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl)
    {
        document.getElementById('xFilePath').value = fileUrl;
    }
</script>