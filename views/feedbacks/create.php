<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Feedbacks $model */

$this->title = 'Create Feedbacks';
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbacks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
