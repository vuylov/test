<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Realty */

$this->title = 'Добавление новой квартиры';
$this->params['breadcrumbs'][] = ['label' => 'Квартиры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        //'file'  => $file
    ]) ?>

</div>