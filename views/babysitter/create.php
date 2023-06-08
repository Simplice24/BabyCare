<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BabySitter $model */

$this->title = 'Create Baby Sitter';
$this->params['breadcrumbs'][] = ['label' => 'Baby Sitters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baby-sitter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
