<?php
//use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<h2>Дома, коттеджи, таунхаусы, дачи</h2>
<?php echo $this->render('_search', ['model' => $model, 'type' => $type]); ?>
<hr>
<div class="app=list">
    <?= DetailView::widget([
        'model' => $object,
    ]) ?>
</div>