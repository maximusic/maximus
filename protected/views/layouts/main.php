<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-skyblue.css" type="text/css" title="skyblue" media="screen" />
        <style type="text/css">
            @import url(<?php echo Yii::app()->request->baseUrl; ?>/css/style.css);			
            @import url(<?php echo Yii::app()->request->baseUrl; ?>/css/tipsy.css);			
            @import url(<?php echo Yii::app()->request->baseUrl; ?>/css/ddsmoothmenu.css);		
        </style>
        <!-- Initialise jQuery Library -->
        <?php Yii::app()->clientScript->registerCoreScript('jquery');   ?>
        <title>Maximus | Home page</title>
    </head>
    <body>
       <?php
        if (CController::getAction()->id != 'login') {
            Yii::app()->user->setReturnUrl(Yii::app()->request->getUrl());
        }
        ?>
        <div id="wide" class="container">
            <div id="top">
                <div class="wrap">
                    <a href="<?php echo Yii::app()->createAbsoluteUrl("/"); ?>" class="logo" title="Maximus"></a>
                    <div id="menu">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'htmlOptions' => array('class' => 'ddsmoothmenu'),
                            'items' => array(
                                array('label' => 'Home', 'url' => array('site/index')),
                                array('label' => 'About', 'url' => array('/about')),
                                array('label' => 'Blog', 'url' => array('/blog/index')),
                                array('label' => 'Contact', 'url' => array('/site/contact')),
                                array('label' => 'Registration', 'url' => array('/site/register'),'visible' => Yii::app()->user->isGuest),
                                array('label' => 'Login', 'url' => array('/site/login'),'visible' => Yii::app()->user->isGuest),
                                array('label' => 'My Profile', 'url' =>Yii::app()->createUrl('/site/profile', array('userId' => Yii::app()->user->getId())),'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Admin', 'url' =>Yii::app()->createUrl('/admin'),'linkOptions' => array('target'=>'_blank'),'visible' => Yii::app()->user->getType() == 'admin'),
                                array('label' => 'Exit ('.Yii::app()->user->name.')', 'url' => array('/site/logout'),'visible' => !Yii::app()->user->isGuest),
                            ),
                        ));
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- Begin Header -->
            </div>
            <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <?php echo $content; ?>

            <div id="footer_lower">
                <div id="footer_info">
                    <?php echo BlockModel::getCopyright(); ?>
                    <div id="attr">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'linkLabelWrapper' => 'span',
                            'linkLabelWrapperHtmlOptions' => array('class' => 'hover'),
                            'items' => array(
                                array('url' => array('#'), 'linkOptions' => array('class' => 'ico_rss', 'title' => 'RSS')),
                                array('url' => array('#'), 'linkOptions' => array('class' => 'ico_delicious', 'title' => 'Delicious')),
                                array('url' => array('#'), 'linkOptions' => array('class' => 'ico_twitter', 'title' => 'Twitter')),
                                array('url' => array('#'), 'linkOptions' => array('class' => 'ico_fliсkr', 'title' => 'Flickr')),
                                array('url' => array('#'), 'linkOptions' => array('class' => 'ico_facebook', 'title' => 'Facebook')),
                            ),
                        ));
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!-- End Footer  -->
        </div>
        <script type="text/javascript">
               $(function() {
                $(".ddsmoothmenu").each(function(){
                    var currentUrl = "'<?php echo Yii::app()->getRequest()->getUrl(); ?>'";
                    $('a[href='+currentUrl+']').addClass('menu-item current');
                })
            });
        </script>
    </body>
</html>

<!-- footer -->


