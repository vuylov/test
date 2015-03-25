<?php
/* @var $this yii\web\View */
use yii\bootstrap\Carousel;
use app\components\NewOffer;
use yii\helpers\Html;
?>

<div class="site-index">
    <?= Carousel::widget([
        'items' => [
           Html::img('@web/img/slide1.jpg'),
            Html::img('@web/img/slide2.jpg'),
            Html::img('@web/img/slide1.jpg'),
        ]
    ]);?>
</div>
<hr>
<div class = "new-offers-container">
    <h4>Новые предложения</h4>
    <?=NewOffer::widget([
        'count' => 5,
        'mode'  => NewOffer::MODE_LAST
    ]);?>
</div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'недвижимость в волгограде, квартиры в волгограде, аренда жилья волгоград, жилая недвижимость волгоград']);
$this->title = 'Агентсво жилья на Тулака';
?>