<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $workshopid
 * @property int $typeid
 * @property string $eventdate
 *
 * @property Eventtypes $type
 * @property Workshop $workshop
 * @property Execution[] $executions
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workshopid', 'typeid', 'eventdate'], 'required'],
            [['workshopid', 'typeid'], 'default', 'value' => null],
            [['workshopid', 'typeid'], 'integer'],
            [['eventdate'], 'safe'],
            [['typeid'], 'exist', 'skipOnError' => true, 'targetClass' => Eventtypes::className(), 'targetAttribute' => ['typeid' => 'id']],
            [['workshopid'], 'exist', 'skipOnError' => true, 'targetClass' => Workshop::className(), 'targetAttribute' => ['workshopid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'workshopid' => 'Workshopid',
            'typeid' => 'Typeid',
            'eventdate' => 'Eventdate',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Eventtypes::className(), ['id' => 'typeid']);
    }

    /**
     * Gets query for [[Workshop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshop()
    {
        return $this->hasOne(Workshop::className(), ['id' => 'workshopid']);
    }

    /**
     * Gets query for [[Executions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExecutions()
    {
        return $this->hasMany(Execution::className(), ['eventid' => 'id']);
    }
}
