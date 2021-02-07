<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnrollmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зачисления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrollment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'workshopid',
                'value' => 'workshop.duration',
                'label' => 'Семинар'
            ],
            [
                'attribute' => 'studentid',
                'value' => 'student.fio',
                'label' => 'Студент'
            ],
            'userno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
