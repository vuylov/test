<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Region;
/*use app\models\Builder;
use app\models\Room;
use app\models\Category;
use app\models\Layout;
use app\models\Furnish;*/
use app\models\User;
use app\models\Role;
use app\models\Status;
use app\models\Earthtype;
?>
<div class="app-filter">
    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
        'enableAjaxValidation'      => false,
        'enableClientValidation'    => false,
    ]); ?>

    <?php if(Yii::$app->user->identity->role_id == Role::ADMIN):?>
    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'fullname'),
        [
            'prompt'    => 'Все риэлторы'
        ]
    );?>
        <?= $form->field($model, 'status')->dropDownList(
            [Status::ACTIVE => 'Активный', Status::DEACTIVE => 'Неактивный'],
            ['prompt' => 'Выберите статус']
        );?>
    <?php endif;?>

    <?= $form->field($model, 'region_id')->dropDownList(
        ArrayHelper::map(Region::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Все районы'
        ]
    ); ?>

    <?/*= $form->field($model, 'earthtype_id')->dropDownList(
        ArrayHelper::map(Earthtype::find()->all(), 'id', 'name'),
        ['prompt' => 'Все виды назначений']
    );*/?>

    <?/*= $form->field($model, 'builder_id')->dropDownList(
        ArrayHelper::map(Builder::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Любой застройщик'
        ]
    ); */?>

    <?php/* echo $form->field($model, 'room_id')->dropDownList(
        ArrayHelper::map(Room::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Любое количество комнат'
        ]
    ); */?>

    <?php/* echo $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Все виды строений'
        ]
    );*/?>
    <?php/* echo $form->field($model, 'layout_id')->dropDownList(
        ArrayHelper::map(Layout::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Все виды планировок'
        ]
    ); */?>

    <?php/* echo $form->field($model, 'furnish_id')->dropDownList(
        ArrayHelper::map(Furnish::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Любая отделка'
        ]
    );*/?>

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