<?php
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<h2>Квартиры</h2>
<?php echo $this->render('_search', ['model' => $searchModel, 'type' => $type]); ?>
<div class="pull-right">
    <?=Html::a('Добавить квартиру', ['create', 'type' => $type], ['class' => 'btn btn-success']); ?>
</div>
<div class="clearfix"></div>
<hr>
<div class="app=list">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
		'emptyText'	=> 'Предложений не найдено',
        'itemView' => function ($model, $key, $index, $widget) use ($type){
            return Html::a(Html::encode($model->address), ['view', 'type' => $type,'id' => $model->id]);
        },
    ]) ?>
</div>
