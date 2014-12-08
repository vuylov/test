<?php
/**
 * @var $model app\models\Appartment
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 */
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<div class="pull-right">
    <?= Html::a('Редактировать', ['admin/update', 'id' => $model->id], ['class' => 'btn btn-success']);?>
</div>
<div class="edit-form">
    <?php echo DetailView::widget([
        'model'         => $model,
        'attributes'    => [
            'address',
            [
                'label' => 'Район',
                'value' => $model->region->name
            ],
        ]
    ]);?>
</div>
