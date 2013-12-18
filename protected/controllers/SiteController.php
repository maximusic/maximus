<?php

/**
 *
 * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
 * @link      http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license   http://www.zfort.com/terms-of-use
 */
class SiteController extends Controller {

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
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Action Get Block By title
     * @param type $title
     * @return type
     */
    public function getBlockByTitle($title, $returnParam = "") {
        //find block by title
        $block = BlockModel::model()->findByAttributes(array('title' => $title));
        if ($block && empty($returnParam)) {
            return $block->content;
        } elseif ($block && $returnParam) {
            return $block->$returnParam;
        }
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('application.views.site.error', $error);
        }
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Displays the contact page
     */
    public function actionContact() {

        $model = new ContactModel;
        //Ajax validation
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'commentform') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        //Collect data
        if (isset($_POST['ContactModel'])) {
            $model->attributes = $_POST['ContactModel'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                $model->save();
                Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'commentform') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Action Register
     */
    public function actionRegister() {
        $userModel = new UserModel;

        $loginForm = new LoginForm;
        //Get post param
        $post = Yii::app()->request->getPost('UserModel');
        //Ajax Validation
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'commentform') {
            echo CActiveForm::validate($userModel);
            Yii::app()->end();
        }
        //Collect data and save it
        if (!empty($post)) {
            $userModel->attributes = Yii::app()->request->getPost('UserModel');
            if ($userModel->save()) {
                if ($loginForm->oneStepLogin($userModel->email, $post['password'])) {
                    $this->redirect('site/index');
                }
            }
        }
        $this->render('register', array(
            'model' => $userModel,
        ));
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Action Page
     * @param type $alias
     * @throws CHttpException
     */
    public function actionPage($alias) {
        $this->layout = 'main';
        $page = PageModel::model()->findByAttributes(array('link' => $alias));
        if (empty($page)) {
            throw new CHttpException(404, 'The specified post cannot be found.');
        }
        switch ($page->template) {
            case "1column":
                $this->layout = '1columnPage';
                $class = 'full_width';
                break;
            case "2columns with right sidebar":
                $this->layout = '2columnRight';
                $class = 'cont';
                break;
        }
        $this->render('dynamicPage', array(
            'page' => $page,
            'class' => $class
        ));
    }

    /*
     * Action User Profile
     */

    public function actionProfile($userId) {

        $model = UserModel::model()->findByPk($userId);
        $passwordForm = new ChangePasswordForm;
        
        $postPassword = Yii::app()->request->getPost('ChangePasswordForm');
        if (isset($postPassword)) {
            $passwordForm->attributes = $postPassword;
            if ($passwordForm->validate()) {
                $model->password = UserModel::encrypt($postPassword['newPassword']);
                $model->save();
                Yii::app()->user->setFlash('successChangePassword', 'Password has been changed');
                $this->refresh();
            }
        }
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'userprofile') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        $post = Yii::app()->request->getPost('UserModel');
        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                Yii::app()->user->setFlash('successProfile', 'Profile has been changed');
                $this->refresh();
            }
        }
        $this->render('profile', array(
            'model' => $model,
            'passwordForm' => $passwordForm
        ));
    }

}
