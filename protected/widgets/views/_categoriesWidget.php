<h3>Categories</h3>
<ul class="slide">
    <?php foreach ($category as $category): ?>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/blog/index',array('category' => $category->title)) ?>" title="<?php echo $category->title; ?>"><?php echo $category->title; ?></a></li>
    <?php endforeach; ?>
</ul>