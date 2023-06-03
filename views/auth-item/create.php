<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AuthItem $model */

?>
<div class="auth-item-create">

    <?= $this->render('_form', [
        'model' => $model,
        'userProfileImage' => $userProfileImage,
    ]) ?>

</div>
