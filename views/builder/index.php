<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление застройщиками';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builder-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "Показано {begin} - {end} из {totalCount} застройщиков",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить застройщика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
