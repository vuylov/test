<?php
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<h1 class="part-title">Земельные участки</h1>
<?php echo $this->render('_search', ['model' => $model, 'type' => $type]); ?>
<div class="app-list">
    <?= ListView::widget([
        'dataProvider'  => $dataProvider,
        'itemOptions'   => ['class' => 'item-realty'],
        'summary'       => '<div class="summary pull-right">Найдено предложений: <span class="badge">{totalCount}</span></div><div class="clearfix"></div>',
        'emptyText'     => '<div class="alert alert-warning" role="alert"><strong>По вашему запросу ничего не найдено</strong></div>',
        'layout'        => '{summary}{items}<div class="clearfix"></div><div class="center-block">{pager}</div>',
        'itemView' => function ($model, $key, $index, $widget) use ($type){
            $template ='<div class="item-view"><div class="img-container" style="width: 218px"><img src="'.$model->thumbnail.'" width="218px" class="img-responsive img-thumbnail"><div class="realty-price">'.$model->price.' руб.</div></div>';
            $template.= '<div class="item-description">';
            $template.='<div><strong>Адрес</strong>: '.$model->address.'</div>';
            $template.='<div><strong>Район</strong>: '.$model->region->name.'</div>';
            $template.='<div><strong>Тип назначения</strong>: '.$model->earthtype->name.'</div>';
            //$template.='<div><strong>Планировка</strong>: '.$model->layout->name.'</div>';
            //$template.='<div><strong>Отделка</strong>: '.$model->furnish->name.'</div>';
            $template.='<div><strong>Площадь</strong>: '.$model->square.' га</div>';
            $template.='<div class="detail-button">'.Html::a('Подробнее', ['view', 'type' => $type,'id' => $model->id], ['class' => 'btn btn-warning']).'</div>';
            $template.='</div>';

            $template.='</div><div class="clearfix"></div><hr>';
            return $template; //Html::a(Html::encode($model->address), ['view', 'type' => $type,'id' => $model->id]);
        },
    ]) ?>
</div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'земельные участки в волгограде, продажа земельных участков в волгограед, земля в волгограде']);
$this->title = 'Земельные участки в Волгограде от Агенства жилья на Тулака';
?>
