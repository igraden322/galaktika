<?php

use app\models\Enrollment;
use app\models\Event;
use app\models\Student;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Execution */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */

$this->title = 'Создание отчёта';
?>
<div class="site-index">

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Student::find()->all(), 'id', 'fio' )) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
