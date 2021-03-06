<?php

use app\models\Enrollment;
use app\models\Event;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Execution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="execution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eventid')->dropDownList(ArrayHelper::map(Event::find()->all(), 'id', 'name' )) ?>

    <?= $form->field($model, 'enrollmentid')->dropDownList(ArrayHelper::map(Enrollment::find()->all(), 'id', 'enrollment' )) ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
