<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Region;
use app\models\Garagetype;
?>
<div class="app-filter">
    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
        'enableAjaxValidation'      => false,
        'enableClientValidation'    => false,
        'options'   => [
            'class' => 'search-box'
        ]
    ]); ?>
    <table class="table search-filter">
        <tr>
            <td>
                <?= $form->field($model, 'region_id')->dropDownList(
                    ArrayHelper::map(Region::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Все районы'
                    ]
                ); ?>
            </td>
            <td>
                <?php echo $form->field($model, 'address') ?>
            </td>
            <td>
                <?= $form->field($model, 'garagetype_id')->dropDownList(
                    ArrayHelper::map(Garagetype::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Все виды'
                    ]
                )->label('Вид'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->field($model, 'beforePrice');?>
            </td>
            <td>
                <?php echo $form->field($model, 'afterPrice');?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <?php echo Html::hiddenInput('type', $type);?>

                <div class="form-group pull-right">
                    <?= Html::submitButton('Поиск', ['class' => 'btn btn-warning']) ?>
                    <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
                </div>
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>