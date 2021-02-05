<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "execution".
 *
 * @property int $id
 * @property int $eventid
 * @property int $enrollmentid
 * @property string $result
 *
 * @property Enrollment $enrollment
 * @property Event $event
 */
class Execution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'execution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eventid', 'enrollmentid', 'result'], 'required'],
            [['eventid', 'enrollmentid'], 'default', 'value' => null],
            [['eventid', 'enrollmentid'], 'integer'],
            [['result'], 'string'],
            [['enrollmentid'], 'exist', 'skipOnError' => true, 'targetClass' => Enrollment::className(), 'targetAttribute' => ['enrollmentid' => 'id']],
            [['eventid'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['eventid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'eventid' => 'Событие',
            'enrollmentid' => 'Зачисление',
            'result' => 'Результат',
        ];
    }

    /**
     * Gets query for [[Enrollment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollment()
    {
        return $this->hasOne(Enrollment::className(), ['id' => 'enrollmentid']);
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'eventid']);
    }
}
