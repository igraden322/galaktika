<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Workshop;
use app\models\EventTypes;


/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workshopid')->dropDownList(ArrayHelper::map(Workshop::find()->all(), 'id', 'duration' )) ?>

    <?= $form->field($model, 'typeid')->dropDownList(ArrayHelper::map(EventTypes::find()->all(), 'id', 'name' )) ?>

    <?= $form->field($model, 'eventdate')->widget(yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
