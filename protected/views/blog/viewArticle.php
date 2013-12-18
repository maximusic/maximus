<!-- Begin Header -->
<div id="simple_header">
    <div class="gradient">
        <div class="header">
            <h1><?php echo $article->title; ?></h1>
        </div>
    </div>
</div>
<!-- End Header -->
</div>
<!-- Begin Breadcrumbs -->
<div id="breadcrumbs">
    <ul>
        <li class="first"><a href="./index.html" title="Home">Home</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/blog') ?>" title="Blog">Blog</a></li>
        <li><?php echo $article->title; ?></li>
    </ul>
    <div class="clear"></div>
</div>
<!-- End Breadcrumbs -->
<!-- Begin Content -->
<div class="content spr">
    <div class="cont">
        <h2><a href="#"><?php echo $article->title; ?></a></h2>
        <div class="posted">Posted by <span class="author"><?php echo $article->author->firstName; ?></span>
            in <?php echo $article->category->title; ?>  on May 30, 2010  |  <?php echo ArticleModel::getCountComments($article->id); ?> &raquo; 
            <span class="post_like"><?php if (!Yii::app()->user->isGuest): ?>
                    Like <i id="like_icon"></i><i class="like"><?php echo LikesModel::getLikes($article->id); ?></i></span><?php endif; ?></div>
        <p><?php echo CHtml::image(ArticleModel::getImagePath($article->id), $alt = "", array('id' => 'blogImage', 'class' => 'pic')); ?></p>
        <p><?php echo $article->content; ?></p>
        <!-- ================== Start Comments Block ========================= -->
        <div class="line"></div>
        <h2><?php echo ArticleModel::getCountComments($article->id); ?></h2>

        <ul id="commentlist">
            <?php foreach ($comment as $comments): ?>
                <?php if ($comments->status): ?>
                    <li class="comment">
                        <div class="avatar"><?php echo CHtml::image(UserModel::getImagePath($comments->userIdAddComment), $alt = "", array('class' => 'avatar')); ?></div>
                        <div class="posted_content">
                            <div class="author"><a href="#"><?php echo $comments->userIdAdd->firstName ?></a></div>
                            <div class="when_posted"><?php echo $comments->creationDate ?></div>
                            <div class="comment_body"><?php echo $comments->content; ?></div>
                        </div>
                        <div class="clear"></div>

                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <div id="sliding-navigation" class="sidebar"></div>
        <!-- ================== End Comments Block ========================= -->
        <!-- ================== Start Comment Form Block ========================= -->
        <?php if (Yii::app()->user->isGuest): ?>
            <div class="warning_box"><?php echo CHtml::link('To add a comment, please login.', Yii::app()->createUrl('site/login')) ?></div>
        <?php else: ?>    
            <h3>Leave a Reply</h3>
            <div class="succsess_box" style="display:none;">Your comment has been saved once it is verified, we will post it</div> 
            <div class="warning_box" style="display:none;">Please enter a message</div> 
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'commentform',
                'enableAjaxValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>
            <p>
                <?php echo $form->labelEx($model, 'content'); ?>
                <?php echo $form->textArea($model, 'content', array('class' => 'AddCommentArticle', 'cols' => 15, 'id' => 'commentarea', 'rows' => 7)); ?>
                <?php echo $form->error($model, 'content'); ?>
            </p>

            </p><?php
            echo CHtml::submitButton('Submit', array(
                'ajax' => array(
                    'type' => 'POST',
                    'url' => Yii::app()->createUrl('/blog/readArticle', array('articleid' => $article->id)),
                    'success' => 'function(result) {
                                if (result != "error") {
                                $(".AddCommentArticle").val("");
                                $(".succsess_box").fadeIn(100);
                                $(".succsess_box").delay(1000).fadeOut();
                                }
                                else {
                                $(".AddCommentArticle").val("");
                                $(".warning_box").fadeIn(100);
                                $(".warning_box").delay(1000).fadeOut();
                                }
                             }'
            )));
            ?></p>
            <?php $this->endWidget(); ?>
        <?php endif; ?>    
    </div>
    <div id="sliding-navigation" class="sidebar">
        <?php
        $this->widget('application.widgets.LatestNewsWidget', array(
            'limit' => 2
        ));
        ?>
    </div>
    <div class="clear"></div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#commentlist li:even').addClass('even');
        $('#commentlist li:even').addClass('odd');
        //Ajax update likes
        $(function() {
            $(".post_like").click(function() {
               $.ajax({
                    type: "post",
                    url: "<?php echo $this->createUrl('blog/like',array('articleId' => $article->id, 'userId' => Yii::app()->user->getId())); ?>",
                    dataType: "json",
                    success: function(response, status) {
                        $('.like').html(response['likes']);
                    },
                });
            })
        })
    });
</script>