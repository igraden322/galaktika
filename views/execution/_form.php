<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Execution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="execution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eventid')->textInput() ?>

    <?= $form->field($model, 'enrollmentid')->textInput() ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
