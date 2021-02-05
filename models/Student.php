<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property int $customerid
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $position
 *
 * @property Enrollment[] $enrollments
 * @property Customer $customer
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerid', 'username', 'firstname', 'lastname', 'email', 'position'], 'required'],
            [['customerid'], 'default', 'value' => null],
            [['customerid'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['firstname', 'lastname'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 15],
            [['position'], 'string', 'max' => 10],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['customerid'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customerid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customerid' => 'Закачик',
            'username' => 'Имя пользователя',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Почта',
            'position' => 'Позиция',
        ];
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollment::className(), ['studentid' => 'id']);
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerid']);
    }
}
