<?php
echo $this->Html->script('ckfinder/ckfinder');
?>
<?php echo $this->Session->flash(); ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('News.id')), null, __('Are you sure you want to delete the newsletter "' . $this->Form->value('News.news_title') . '"?')); ?></li>
        <li><?php echo $this->Html->link(__('Back to Newsletter Lists'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="news form">
    <?php echo $this->Form->create('News', array('novalidate' => true)); ?>
    <fieldset>
            <!--<legend><?php echo __('Edit News'); ?></legend>-->
        <?php
//        $publishStatus = array('Private' => 'Private', 'Published' => 'Published');
        echo $this->Form->input('id');
        echo $this->Form->input('news_title', array('label' => 'Subject'));
        echo $this->Form->input('news_description', array('id' => 'news_description', 'news' => 'ckeditor'));
//        echo $this->Form->input('publish_status', array('options' => $publishStatus, 'default' => 'Private'));
        //echo $this->Form->input('User');
        echo $this->Form->input('pdf_name', array('id' => 'xFilePath', 'class' => 'ckeditor', 'style' => 'width:500px'));
        echo $this->Form->button('Browse PDF file', array('onclick' => 'BrowseServer()', 'type' => 'button', 'style' => 'padding:15px 5px;margin-top:-70px; margin-left:555px;float:left'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
//    var ck_newsContent = CKEDITOR.replace( 'news_description',{
//        filebrowserBrowseUrl : '<?php // echo $pathForFinder  ?>/js/ckfinder/ckfinder.html',
//        filebrowserWindowWidth : '600',
//        filebrowserWindowHeight : '300'
//    } ); 
//    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;

</script>


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