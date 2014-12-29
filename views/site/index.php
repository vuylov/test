<?php
/* @var $this yii\web\View */
use yii\bootstrap\Carousel;
use app\components\NewOffer;

?>

<div class="site-index">
    <?= Carousel::widget([
        'items' => [
            '<img src="'.dirname(Yii::$app->homeUrl).'/img/slide1.jpg">',
            '<img src="'.dirname(Yii::$app->homeUrl).'/img/slide2.jpg">',
            '<img src="'.dirname(Yii::$app->homeUrl).'/img/slide1.jpg">',
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