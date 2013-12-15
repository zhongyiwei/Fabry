<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Back To List of News'), array('action' => 'index')); ?></li>
        
    </ul>
</div>
<div class="news view">
    <dl>
<!--		<dt><?php echo __('Id'); ?></dt>
            <dd>
        <?php echo h($news['News']['id']); ?>
                    &nbsp;
            </dd>-->
        <dt><?php echo __('News Title'); ?></dt>
        <dd>
            <?php echo h($news['News']['news_title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('News Description'); ?></dt>
        <dd>
            <?php echo ($news['News']['news_description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('News Attachment'); ?></dt>
        <dd>
            <?php echo ($news['News']['pdf_name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>



