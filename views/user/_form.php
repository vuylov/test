<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

    <?php // $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'lastvisit_time')->textInput() ?>

    <?= $form->field($model, 'deactivate_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
