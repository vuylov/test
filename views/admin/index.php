<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RealtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Админка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <div>В систему загружено <?=$count?> объект(ов) недвижимости</div>
</div>
