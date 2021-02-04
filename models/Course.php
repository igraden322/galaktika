<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $productid
 * @property string $name
 * @property string $target
 * @property string $duration
 * @property float $price
 * @property int $teacherid
 * @property string $deployment
 * @property string $status
 *
 * @property Product $product
 * @property Teacher $teacher
 * @property Workshop[] $workshops
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productid', 'name', 'target', 'duration', 'price', 'teacherid', 'deployment', 'status'], 'required'],
            [['productid', 'teacherid'], 'default', 'value' => null],
            [['productid', 'teacherid'], 'integer'],
            [['price'], 'number'],
            [['deployment'], 'string'],
            [['name', 'target', 'status'], 'string', 'max' => 150],
            [['duration'], 'string', 'max' => 25],
            [['price'], 'unique'],
            [['productid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productid' => 'id']],
            [['teacherid'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacherid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productid' => 'Productid',
            'name' => 'Name',
            'target' => 'Target',
            'duration' => 'Duration',
            'price' => 'Price',
            'teacherid' => 'Teacherid',
            'deployment' => 'Deployment',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productid']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacherid']);
    }

    /**
     * Gets query for [[Workshops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::className(), ['courseid' => 'id']);
    }
}
