<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Builder */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Builders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builder-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
        ],
    ]) ?>

    <p class="pull-right">
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить застройщика?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
