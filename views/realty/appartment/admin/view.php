<?php
/**
 * @var $model app\models\Appartment
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 */
use yii\widgets\DetailView;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use app\models\Role;
use app\models\Status;
?>
<div class="view-form">
    <?php echo DetailView::widget([
        'model'         => $model,
        'attributes'    => [
            'address',
            ['label' => 'Район','value' => $model->region->name],
            ['label' => 'Застройщик', 'value' => ($model->builder)?$model->builder->name:'Нет информации о застройщике'],
            ['label' => 'Количество комнат', 'value' => ($model->room)?$model->room->name: 'Нет информации'],
            ['label' => 'Тип постройки', 'value' => ($model->category)?$model->category->name: 'Нет информации'],
            ['label' => 'Тип планировки', 'value' => ($model->layout)?$model->layout->name: 'Нет информации'],
            ['label' => 'Отделка', 'value' => ($model->furnish)?$model->furnish->name: 'Нет информации'],
            ['label' => 'Площадь', 'value' => ($model->square)?$model->square.' м2': 'Нет информации'],
            ['label' => 'Отделка', 'value' => ($model->furnish)?$model->furnish->name: 'Нет информации'],
            ['label' => 'Адрес', 'value' => ($model->address)?$model->address: 'Нет информации'],
            ['label' => 'Детали', 'value' => ($model->detail)?$model->detail: 'Нет информации'],
            /*(Yii::$app->user->identity->role_id == Role::ADMIN)?
                ['label' => 'Статус', 'value' => ($model->status)?'Активный': 'Неактивный']:
                '',*/
            ['label' => 'Информация о владельце', 'value' => ($model->owner)?$model->owner: 'Нет информации'],
            ['label' => 'Дата создания', 'value' => Yii::$app->formatter->asDatetime($model->create_time, 'MM/dd/yyyy HH:mm:ss')],
            ['label' => 'Цена', 'value' => ($model->price)?$model->price:'Нет информации'],
            ['label' => 'Добавил', 'value' => $model->user->fullname],
        ]
    ]);?>
    <?php if($images):?>
        <div class="col-md-5">
            <?php foreach($images as $image):?>
                <?php $items[] = Yii::$app->formatter->asImage('@web/'.$image->path, ['title' => $image->name, 'alt' => $image->name]);?>
            <?php endforeach;?>
            <?=Carousel::widget([
                'items' => $items
            ]);?>
        </div>
    <?php endif;?>
    <div class="pull-right">
        <?= Html::a('Редактировать', ['admin/update', 'id' => $model->id], ['class' => 'btn btn-success']);?>
        <?= Html::a('Удалить', ['admin/delete', 'id' => $model->id], ['class' => 'btn btn-danger']);?>
    </div>
</div>