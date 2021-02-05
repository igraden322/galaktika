<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enrollment".
 *
 * @property int $id
 * @property int $workshopid
 * @property int $studentid
 * @property string $userno
 *
 * @property Student $student
 * @property Workshop $workshop
 * @property Execution[] $executions
 */
class Enrollment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrollment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workshopid', 'studentid', 'userno'], 'required'],
            [['workshopid', 'studentid'], 'default', 'value' => null],
            [['workshopid', 'studentid'], 'integer'],
            [['userno'], 'string', 'max' => 25],
            [['studentid'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentid' => 'id']],
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
            'workshopid' => 'Мастерская',
            'studentid' => 'Студент',
            'userno' => 'Номер пользователя',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'studentid']);
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
        return $this->hasMany(Execution::className(), ['enrollmentid' => 'id']);
    }
}
