<?php

/**
 * This is the model class for table "ivt_detail".
 *
 * The followings are the available columns in table 'ivt_detail':
 * @property integer $id
 * @property string $itemnum
 * @property string $description
 * @property string $unitprice
 * @property integer $amount
 * @property integer $invoice_id
 *
 * The followings are the available model relations:
 * @property Invoice $invoice
 */
class Detail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        

        public function tableName()
	{
		return 'ivt_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itemnum, description, unitprice, amount, invoice_id', 'required'),
			array('amount, invoice_id', 'numerical', 'integerOnly'=>true),
			array('itemnum, description', 'length', 'max'=>45),
			array('unitprice', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, itemnum, description, unitprice, amount, invoice_id', 'safe', 'on'=>'search'),
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
			'invoice' => array(self::BELONGS_TO, 'Invoice', 'invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'itemnum' => 'Itemnum',
			'description' => 'Description',
			'unitprice' => 'Unitprice',
			'amount' => 'Amount',
			'invoice_id' => 'Invoice',
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
		$criteria->compare('itemnum',$this->itemnum,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('unitprice',$this->unitprice,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('invoice_id',$this->invoice_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function subTotal(){
            return $this->amount*$this->unitprice;
        }
}
