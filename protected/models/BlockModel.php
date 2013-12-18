<?php

/**
 * This is the model class for table "Block".
 *
 * The followings are the available columns in table 'Block':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $buttonLink
 * @property string $buttonName
 * @property string $pageName
 */
class BlockModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, image, buttonLink, buttonName, pageName', 'required'),
			array('title, buttonLink', 'length', 'max'=>75),
			array('image', 'length', 'max'=>250),
			array('buttonName', 'length', 'max'=>25),
			array('pageName', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, content, image, buttonLink, buttonName, pageName', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'image' => 'Image',
			'buttonLink' => 'Button Link',
			'buttonName' => 'Button Name',
			'pageName' => 'Page Name',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('buttonLink',$this->buttonLink,true);
		$criteria->compare('buttonName',$this->buttonName,true);
		$criteria->compare('pageName',$this->pageName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => 5
                        )
		));
	}
        /**
         * Get Copyright
         * @return type
         */
        public static function getCopyright(){
            $block =  BlockModel::model()->findByAttributes(array('title' => 'copyright'));
            return $block->content;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BlockModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
