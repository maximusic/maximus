<?php

class BlogController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'cocoCod' => array(
                'class' => 'CocoCodAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $categoryTitle = Yii::app()->request->getParam('category');
        $model = new ArticleModel('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['ArticleModel'])) {
            $model->attributes = $_GET['ArticleModel'];
        }
        if (isset($categoryTitle)) {
            $category = CategoryModel::model()->findByAttributes(array('title' => $categoryTitle));
            $model->categoryId = $category->id;
        }
        $this->render('index', array(
            'dataProvider' => $model->search(),
            'model' => $model
        ));
    }

    public function actionReadArticle() {
        $articleId = Yii::app()->request->getParam('articleid');
        $article = ArticleModel::model()->findByAttributes(array('id' => $articleId));
        $ViewComment = CommentModel::model()->findAllByAttributes(array('acrticleId' => $articleId));
        $comment = new CommentModel('addComment');

        $post = Yii::app()->request->getPost('CommentModel');
        if (isset($post)) {
            $comment->attributes = $post;
            $comment->userIdAddComment = Yii::app()->user->getId();
            $comment->acrticleId = $articleId;
            if ($comment->validate() == false) {
                echo "error";
                Yii::app()->end();
            } else {
                $comment->save();
                Yii::app()->end();
            }
        }
        $this->render('viewArticle', array(
            'article' => $article,
            'comment' => $ViewComment,
            'model' => $comment
        ));
    }

    /**
     * Action Like
     * Ajax Action:)
     */
    public function actionLike() {
        $like = new LikesModel;
        $userId = Yii::app()->request->getParam('userId');
        $articleId = Yii::app()->request->getParam('articleId');
        $userAlreadyLikes = LikesModel::model()->findByAttributes(array('articleId' => $articleId, 'userIdLike' => $userId));
        if (!empty($articleId) && !empty($userId) && !empty($userAlreadyLikes)) {
            $userAlreadyLikes->delete();
            $countLikes = LikesModel::getLikes($articleId);
             echo CJavaScript::jsonEncode(array('likes' => $countLikes));
             Yii::app()->end();
        } else {
            $like->userIdLike = $userId;
            $like->articleId = $articleId;
            $like->save();
            $countLikes = LikesModel::getLikes($articleId);
            echo CJavaScript::jsonEncode(array('likes' => $countLikes));
            Yii::app()->end();
        }

        $this->redirect(Yii::app()->request->urlReferrer);
    }

}