<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Realty */

$this->title = 'Редактирование информации о квартире: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Realties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="realty-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
