<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BookingsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bookings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'babysitter_age_range') ?>

    <?= $form->field($model, 'languages_spoken') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'number_of_babysitters') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'starting_time') ?>

    <?php // echo $form->field($model, 'ending_time') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
