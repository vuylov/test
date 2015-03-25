<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Realty */
$this->title = 'Добавление гаража или парковки';
$this->params['breadcrumbs'][] = ['label' => 'Частный дом', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>