<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

?>
<div class="services-update">

    <?= $this->render('_form', [
        'model' => $model,
        'userProfileImage' => $userProfileImage,
    ]) ?>

</div>
