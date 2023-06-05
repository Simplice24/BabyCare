<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AuthItem $model */

?>
<div class="auth-item-update">
    
    <?= $this->render('_form', [
        'model' => $model,
        'type' => $type,
    ]) ?>

</div>
