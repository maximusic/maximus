<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="content spr">   
    <?php echo $content; ?>
    <div id="sliding-navigation" class="sidebar">
        <?php
        $this->widget('application.widgets.LatestNewsWidget', array(
            'limit' => 3
        ));
        ?>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php $this->endContent(); ?>

