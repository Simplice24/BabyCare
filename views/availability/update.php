<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var app\models\Availability $model */
?>
<div class="availability-update">
    <?= $this->render('_form', [
        'model' => $model,
        'userProfileImage' => $userProfileImage,
    ]) ?>
</div>
