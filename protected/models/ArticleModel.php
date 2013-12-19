<?php

/**
 * This is the model class for table "Article".
 *
 * The followings are the available columns in table 'Article':
 * @property integer $id
 * @property string $title
 * @property string $shirtDesc
 * @property string $content
 * @property integer $authorId
 * @property integer $categoryId
 * @property string $createdTime
 *
 * The followings are the available model relations:
 * @property User $author
 * @property Category $category
 * @property Comment[] $comments
 */
class ArticleModel extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Article';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, shirtDesc, content,authorId, categoryId', 'required'),
            array('authorId, categoryId', 'numerical', 'integerOnly' => true),
            array('title,image', 'length', 'max' => 100),
            array('createdTime', 'default', 'value' => new CDbExpression('NOW()')),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, shirtDesc, image,content, authorId, categoryId, createdTime', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'author' => array(self::BELONGS_TO, 'UserModel', 'authorId'),
            'category' => array(self::BELONGS_TO, 'CategoryModel', 'categoryId'),
            'comments' => array(self::HAS_MANY, 'CommentModel', 'acrticleId'),
        );
    }

    /**
     * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
     * Get Count Comments
     * @param type $articleId
     * @return type
     */
    public static function getCountComments($articleId) {
        $comment = CommentModel::model()->findAllByAttributes(array('acrticleId' => $articleId, 'status' => true));
        if ($comment) {
            return count($comment) . " Comments ";
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'shirtDesc' => 'Shirt Desc',
            'content' => 'Content',
            'authorId' => 'Author',
            'categoryId' => 'Category',
            'createdTime' => 'Created Time',
            'image' => 'image',
        );
    }

    /**
     * Event for coco uploader
     */
    public function onFileUploaded($fullFileName, $userdata, $results) {
        //Save to session
        $this->onAfterFileUploaded($fullFileName, 'image');
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('shirtDesc', $this->shirtDesc, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('authorId', $this->authorId);
        $criteria->compare('categoryId', $this->categoryId);
        $criteria->compare('image', $this->image);
        $criteria->compare('createdTime', $this->createdTime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 7
            )
        ));
    }

    public function behaviors() {
        return array(
            'CocoFileBehavior' => array(
                'class' => 'application.models.behaviors.CocoFileBehavior',
                'path' => Yii::getPathOfAlias('webroot') . '/uploads/',
                'url' => Yii::app()->getBaseUrl(true) . '/uploads/',
                'fields' => array('image'),
                'primaryKey' => 'id',
            ),
            'ActionExBehavior' => array(
                'class' => 'application.models.behaviors.ActionExBehavior',
                'exDeletePrimaryKey' => array(1),
                'exUpdatePrimaryKey' => array(1),
                'primaryKey' => 'id',
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ArticleModel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
