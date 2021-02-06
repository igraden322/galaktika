<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workshop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workshop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'courseid')->textInput() ?>

    <?= $form->field($model, 'begdate')->widget(yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($model, 'enddate')->widget(yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
