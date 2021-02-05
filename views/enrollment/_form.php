<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enrollment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enrollment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workshopid')->textInput() ?>

    <?= $form->field($model, 'studentid')->textInput() ?>

    <?= $form->field($model, 'userno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
