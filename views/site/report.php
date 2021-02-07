<?php

use app\models\Enrollment;
use app\models\Event;
use app\models\Student;
use app\models\Teacher;
use app\models\Workshop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\Alert;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Execution */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */

$this->title = 'Создание отчёта';
?>
<div class="site-index">

<div class="report-form">

    <?= Alert::widget() ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Student::find()->all(), 'id', 'fio' )) ?>

    <?= $form->field($model, 'consult')->dropDownList(ArrayHelper::map(Teacher::find()->all(), 'id', 'name' )) ?>

    <?= $form->field($model, 'workshop')->dropDownList(ArrayHelper::map(Workshop::find()->all(), 'id', 'date' )) ?>

    <?= $form->field($model, 'participation')->textarea() ?>

    <?= $form->field($model, 'execution')->textarea() ?>

    <?= $form->field($model, 'answers')->textarea() ?>

    <?= $form->field($model, 'commentary')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
