 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script>
$(function() {
$( document ).tooltip();
});
</script>
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
        <?php echo $this->getBlockByTitle('fast'); ?>
        <div class="line"></div>
        <div class="col1">
            <?php echo $this->getBlockByTitle('secure'); ?>
            <div class="row"><a href="<?php echo $this->getBlockByTitle('secure', 'buttonLink'); ?>" class="more"><b></b><?php echo $this->getBlockByTitle('secure', 'buttonName'); ?></a></div>
        </div>
        <div class="col2">
            <?php echo $this->getBlockByTitle('professional'); ?>
            <div class="row"><a href="<?php echo $this->getBlockByTitle('professional', 'buttonLink'); ?>" class="more"><b></b><?php echo $this->getBlockByTitle('professional', 'buttonName'); ?></a></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="sidebar">
        <?php
        $this->widget('application.widgets.LatestNewsWidget', array(
            'limit' => 2
        ));
        ?>
    </div>
    <div class="clear"></div>
</div>

<div id="footer_sidebar">
</div>
<!-- End Content -->

