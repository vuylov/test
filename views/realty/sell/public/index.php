<?php
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<h2>Продажа коммерческой недвижимости</h2>
<?php echo $this->render('_search', ['model' => $model, 'type' => $type]); ?>
<hr>
<div class="app=list">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) use ($type){
            return Html::a(Html::encode($model->address), ['view', 'type' => $type,'id' => $model->id]);
        },
    ]) ?>
</div>
