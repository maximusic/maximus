<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ChangePasswordForm extends CFormModel
{

    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('oldPassword, newPassword, confirmPassword', 'required'),
            array('oldPassword, newPassword, confirmPassword', 'length', 'max' => 100),
            array('confirmPassword', 'compare', 'compareAttribute'=>'newPassword'),
            array('oldPassword', 'checkPassword'),
            // rememberMe needs to be a boolean
        );
    }

    /**
     * Declares attribute labels.
     */
    
    public function checkPassword($attribute,$params){
        $model = UserModel::model()->findByAttributes(array('id' => Yii::app()->user->getId(),'password' => UserModel::encrypt($this->oldPassword)));
        if(empty($model)) {
            $this->addError($attribute, 'Old Password not valid!');
        }
        else {
            return true;
        }
    }
    public function attributeLabels()
    {
        return array(
            'oldPassword' => 'Old Password',
            'newPassword' => 'New Password',
            'confirmPassword' => 'Confirm Password',
        );
    }

}
