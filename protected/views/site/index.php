<?php Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".succsess_box").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
); ?>
<!-- Begin Content -->
<div id="simple_header">
    <div class="gradient">
        <div class="header">
            <?php echo $this->getBlockByTitle('header'); ?>
        </div>
    </div>
</div>
<div class="content spr">
    <div class="cont">
        <?php echo $this->getBlockByTitle('about'); ?>
        <div class="line"></div>

        <div class="col1">
            <p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pic1.jpg" width="250" height="82" alt="" class="pic" /></p>
            <?php echo $this->getBlockByTitle('col1'); ?>
            <div class="row"><a href="<?php echo $this->getBlockByTitle('col1', 'buttonLink'); ?>" class="more"><b></b><?php echo $this->getBlockByTitle('col1', 'buttonName'); ?></a></div>
        </div>
        <div class="col2">
            <p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pic2.jpg" width="250" height="82" alt="" class="pic" /></p>
            <?php echo $this->getBlockByTitle('col2'); ?>
            <div class="row"><a href="<?php echo $this->getBlockByTitle('col2', 'buttonLink'); ?>" class="more"><b></b><?php echo $this->getBlockByTitle('col2', 'buttonName'); ?></a></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="sidebar">
        <?php
        $this->widget('application.widgets.LatestNewsWidget', array(
            'limit' => 3
        ));
        ?>
    </div>
    <div class="clear"></div>
</div>

<div id="footer_sidebar">
    <div class="footer_sidebar_cont">
        <?php echo $this->getBlockByTitle('why'); ?>
    </div>
</div>
<!-- End Content -->

