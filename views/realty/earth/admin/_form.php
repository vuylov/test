<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Region;
use yii\helpers\Url;
use kartik\file\FileInput;
use app\models\Role;
use app\models\User;
use app\models\Status;
use app\models\Earthtype;

/* @var $this yii\web\View */
/* @var $model app\models\Realty */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="appartment-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype'   => 'multipart/form-data',
            //'class'     => 'form-inline'
        ],
    ]);?>

    <?php if(Yii::$app->user->identity->role_id == Role::ADMIN && !$model->isNewRecord):?>

        <?= $form->field($model, 'user_id')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'fullname'),
            ['prompt' => 'Выберите риэлтора']
        );?>

        <?= $form->field($model, 'status')->dropDownList(
            [Status::ACTIVE => 'Активный', Status::DEACTIVE => 'Неактивный'],
            ['prompt' => 'Выберите статус']
        );?>

    <?php endif;?>

    <?= $form->field($model, 'region_id')->dropDownList(
        ArrayHelper::map(Region::find()->all(), 'id', 'name'),
        [
            'prompt'    => 'Выберите район'
        ]
    );?>

    <?= $form->field($model, 'earthtype_id')->dropDownList(
        ArrayHelper::map(Earthtype::find()->all(), 'id', 'name'),
        ['prompt' => 'Все виды назначений']
    );?>

    <?= $form->field($model, 'square')->textInput(['placeholder' => 'Квадратура квартиры без единиц измерения']);?>

    <?= $form->field($model, 'address')->textInput();?>

    <?= $form->field($model, 'detail')->textarea(['placeholder' => 'Указывайте здесь всю дополнительную информацию']);?>

    <?= $form->field($model, 'owner')->textarea(['placeholder' => 'Указывайте фИО и номер контактного телефона']);?>

    <?= $form->field($model, 'price')->textInput(['placeholder'  => 'Цена должна быть числом']);?>

    <?php if(!$model->isNewRecord && count($file) > 0):?>
        <?=Html::label('Загруженные изображения');?>
        <div>
            <?php foreach($file as $f):?>
                <div class="image-item">
                    <?=Html::img('@web/'.$f->path, ['id' => 'file-'.$f->id,'class' => 'file-preview-image', 'alt' => $f->name, 'data' => $f->id]);?>
                    <?=Html::a('Удалить', ['file/delete', 'id' => $f->id, 'model'=> $model->id], ['class' => 'btn btn-danger delete-image']);?>
                    <?php if($f->path !== $model->thumb):?>
                        <?=Html::a('Превью', ['#'], ['class' => 'btn btn-success img-first-preview',
                            'onclick'   => "
                                    $.ajax({
                                        type: 'POST',
                                        cache: false,
                                        url: '".Url::to(['file/thumbnail', 'id' => $f->id, 'model' => $model->id])."',
                                        success: function(response){
                                            alert(response);
                                            location.reload();
                                        }
                                    });return false;"
                        ]);?>
                    <?php endif;?>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>

    <?php echo $form->field($model, 'file[]')->widget(FileInput::classname(),[
        'options'       => [
            'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'showUpload'        => false,
            'browseLabel'       => 'Обзор',
            'removeLabel'       => 'Удалить',
            'overwriteInitial'  => true,
        ],
    ]);
    ?>

    <div class="clearfix"></div>
    <div class="pull-right">
        <?= Html::submitButton(($model->isNewRecord)?"Добавить":"Обновить", ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Отмена', ['admin/index'], ['class' => 'btn btn-primary']);?>

    </div>
    <?php ActiveForm::end();?>
</div>
