<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
        'role' => $role,
    ]) ?>

</div>
