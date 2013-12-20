<!-- Begin Breadcrumbs -->
<div id="breadcrumbs">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
	'links' => array(
		'Home' => '/',
		"$page->title",
	),
	'homeLink' => false,
	'separator' => '',
	'tagName' => 'ul',
	'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
	'activeLinkTemplate' => '<li><a href="{url}">{label}</a> <span class="divider"></span></li>',
));?><!-- breadcrumbs -->
    <div class="clear"></div>
</div>

<!-- End Breadcrumbs -->
<!-- Begin Content -->
<div class="<?php echo $class; ?>">
    <?php echo $page->content; ?>
</div>



