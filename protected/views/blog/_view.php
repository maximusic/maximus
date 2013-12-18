    <h2><a href="<?php echo Yii::app()->createAbsoluteUrl('blog/readArticle/', array('articleid' => $data->id)) ?>"><?php echo $data->title; ?></a></h2>
    <div class="posted">Posted by <span class="author"><?php echo $data->author->firstName; ?></span> in <?php echo $data->category->title; ?> on <?php echo $data->createdTime; ?>  |  <?php echo ArticleModel::getCountComments($data->id); ?> &raquo;</div>
    <p><?php echo CHtml::image(ArticleModel::getImagePath($data->id), $alt = "", array('id' => 'blogImage', 'class' => 'pic')); ?></p>
    <p><?php echo $data->shirtDesc; ?><a href="<?php echo Yii::app()->createAbsoluteUrl('blog/readArticle/', array('articleid' => $data->id)) ?>"> Continue Reading &raquo;</a></p>
    <div class="gototop">
        <?php $this->widget('application.extensions.scroll.ScrollTop',array(
        'label' => 'Go on top',
        'speed' => 'slow'
)); ?>
        
    </div>
