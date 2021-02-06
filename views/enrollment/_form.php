<?php

use app\models\Student;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Workshop;

/* @var $this yii\web\View */
/* @var $model app\models\Enrollment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enrollment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workshopid')->dropDownList(ArrayHelper::map(Workshop::find()->all(), 'id', 'duration' )) ?>

    <?= $form->field($model, 'studentid')->dropDownList(ArrayHelper::map(Student::find()->all(), 'id', 'fio' )) ?>

    <?= $form->field($model, 'userno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
