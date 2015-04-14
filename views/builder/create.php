<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Builder */

$this->title = 'Добавление застройщика';
$this->params['breadcrumbs'][] = ['label' => 'Builders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
