<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExecutionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выполнение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="execution-index">

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
                'attribute' => 'eventid',
                'value' => 'event.name',
                'label' => 'Событие'
            ],
            [
                'attribute' => 'enrollmentid',
                'value' => 'enrollmentid',
                'label' => 'Зачисление №'
            ],
            'result:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
