<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $region
 * @property string $phone
 * @property string $email
 * @property string $contact
 *
 * @property Student[] $students
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city', 'region', 'phone', 'email', 'contact'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['city', 'region', 'email', 'contact'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'city' => 'Город',
            'region' => 'Регион',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'contact' => 'Контакт',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['customerid' => 'id']);
    }
}
