<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Realty */

$this->title = 'Create Realty';
$this->params['breadcrumbs'][] = ['label' => 'Realties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
