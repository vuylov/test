<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Region;
use app\models\Earthtype;
?>
<div class="app-filter">
    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
        'enableAjaxValidation'      => false,
        'enableClientValidation'    => false,
    ]); ?>

    <?= $form->field($model, 'region_id')->dropDownList(
        ArrayHelper::map(Region::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Все районы'
        ]
    ); ?>

    <?= $form->field($model, 'earthtype_id')->dropDownList(
        ArrayHelper::map(Earthtype::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Любой тип'
        ]
    ); ?>

    <?php echo $form->field($model, 'address') ?>

    <?php echo $form->field($model, 'beforePrice');?>

    <?php echo $form->field($model, 'afterPrice');?>

    <?php echo Html::hiddenInput('type', $type);?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>