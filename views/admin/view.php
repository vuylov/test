<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Realty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Realties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type_id',
            'user_id',
            'region_id',
            'builder_id',
            'room_id',
            'layout_id',
            'housetype_id',
            'square',
            'square_plot',
            'price',
            'address',
            'detail:ntext',
            'status',
            'owner',
            'create_time',
            'deactivate_time',
        ],
    ]) ?>

</div>
