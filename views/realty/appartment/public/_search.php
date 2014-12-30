<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Region;
use app\models\Builder;
use app\models\Room;
use app\models\Category;
use app\models\Layout;
use app\models\Furnish;
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
    <table class="table search-filter table-responsive">
        <tr>
            <td>
                <?= $form->field($model, 'region_id')->dropDownList(
                    ArrayHelper::map(Region::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Все районы',
                    ]
                ); ?>
            </td>
            <td>
                <?= $form->field($model, 'builder_id')->dropDownList(
                    ArrayHelper::map(Builder::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Любой застройщик',
                    ]
                ); ?>
            </td>
            <td>
                <?php echo $form->field($model, 'room_id')->dropDownList(
                    ArrayHelper::map(Room::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Любое количество комнат'
                    ]
                ); ?>
            </td>
            <td>
                <?php echo $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Все виды строений'
                    ]
                );?>
            </td>
            <td> <?php echo $form->field($model, 'layout_id')->dropDownList(
                    ArrayHelper::map(Layout::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Все виды планировок'
                    ]
                ); ?></td>
        </tr>
        <tr>
            <td>
                <?php echo $form->field($model, 'furnish_id')->dropDownList(
                    ArrayHelper::map(Furnish::find()->all(), 'id', 'name'),
                    [
                        'prompt'    => 'Любая отделка'
                    ]
                );?>
            </td>
            <td>
                <?php echo $form->field($model, 'address') ?>
            </td>
            <td>
                <?php echo $form->field($model, 'beforePrice');?>
            </td>
            <td><?php echo $form->field($model, 'afterPrice');?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo Html::hiddenInput('type', $type);?>
                <div class="form-group pull-right">
                    <?= Html::submitButton('Поиск', ['class' => 'btn btn-warning']) ?>
                    <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
                </div>
            </td>
        </tr>
    <?php ActiveForm::end(); ?>
    </table>
</div>