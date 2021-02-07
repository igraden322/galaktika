<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workshop".
 *
 * @property int $id
 * @property int $courseid
 * @property string $begdate
 * @property string $enddate
 *
 * @property Enrollment[] $enrollments
 * @property Event[] $events
 * @property Course $course
 */
class Workshop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workshop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['courseid', 'begdate', 'enddate'], 'required'],
            [['courseid'], 'default', 'value' => null],
            [['courseid'], 'integer'],
            [['begdate', 'enddate'], 'safe'],
            [['courseid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courseid' => 'Курс',
            'begdate' => 'Дата начала',
            'enddate' => 'Дата окончания',
            'workshop' => 'Семинар'
        ];
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollment::className(), ['workshopid' => 'id']);
    }

    /**
     * Gets query for [[Events]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['workshopid' => 'id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'courseid']);
    }

    public function getDuration()
    {
        return $this->begdate.' - '.$this->enddate.'(Семинар № '.$this->id.')';
    }

    public function getDate(){
        return $this->begdate.' - '.$this->enddate;
    }
}
