<?php

/**
 * This is the model class for table "Comment".
 *
 * The followings are the available columns in table 'Comment':
 * @property integer $id
 * @property string $content
 * @property string $creationDate
 * @property integer $userIdAddComment
 * @property integer $userIdReplyComment
 * @property integer $acrticleId
 *
 * The followings are the available model relations:
 * @property Article $acrticle
 * @property User $userIdAddComment0
 * @property User $userIdReplyComment0
 */
class CommentModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
         public $email;
         public $name;
         const ADMIN_COMMENT = 1;
         const SOMETHING_ELSE = 2;

    
	public function tableName()
	{
		return 'Comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
             array('content', 'required','on'=>'addComment','message'=>'Вы не ввели комментарий'),
//			array('content, userIdAddComment, acrticleId', 'required'),
			array('userIdAddComment,acrticleId', 'numerical', 'integerOnly'=>true),
            array('email','email'),
            array('status,name','length', 'max' => 15),
            array('creationDate', 'default','value' => new CDbExpression('NOW()')),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, creationDate, userIdAddComment, status,acrticleId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                        'reply'=>array(self::HAS_MANY, 'ReplyCommentModel', 'commentId'),
			'acrticle' => array(self::BELONGS_TO, 'ArticleModel', 'acrticleId'),
			'userIdAdd' => array(self::BELONGS_TO, 'UserModel', 'userIdAddComment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Message',
			'creationDate' => 'Creation Date',
			'userIdAddComment' => 'User Id Add Comment',
			'userIdReplyComment' => 'User Id Reply Comment',
			'acrticleId' => 'Acrticle',
                        'status' => 'Status'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('creationDate',$this->creationDate,true);
		$criteria->compare('userIdAddComment',$this->userIdAddComment);
		$criteria->compare('acrticleId',$this->acrticleId);
                $criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CommentModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->status  = 0;
            }
            return true;
        }
        else
            return false;
    }
}
