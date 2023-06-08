<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BabySitter $model */

$this->title = 'Update Baby Sitter: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Baby Sitters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baby-sitter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
