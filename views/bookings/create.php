<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bookings $model */

?>
<div class="bookings-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
