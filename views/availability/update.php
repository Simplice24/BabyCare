<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Availability $model */

$this->title = 'Update Availability: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Availabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="availability-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
