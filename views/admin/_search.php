<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RealtySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="realty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'builder_id') ?>

    <?php // echo $form->field($model, 'room_id') ?>

    <?php // echo $form->field($model, 'layout_id') ?>

    <?php // echo $form->field($model, 'housetype_id') ?>

    <?php // echo $form->field($model, 'square') ?>

    <?php // echo $form->field($model, 'square_plot') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'deactivate_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
