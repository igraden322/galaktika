<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventTypes */

$this->title = 'Create Event Types';
$this->params['breadcrumbs'][] = ['label' => 'Event Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
