    <h3>Popular Posts</h3>
    <ul class="recent_comm">
        <?php foreach ($model as $article): ?>
            <li>
                <a href="<?php echo Yii::app()->createAbsoluteUrl('blog/readArticle/',array('articleid' =>$article->id )) ?>"><img src="<?php echo ArticleModel::getImagePath($article->id); ?>" width="67" height="63" alt="" class="pic_left" />
                    <?php echo $article->shirtDesc; ?><span class="date">June 12, 2010</span></a>
            </li>
        <?php endforeach; ?>
    </ul>
