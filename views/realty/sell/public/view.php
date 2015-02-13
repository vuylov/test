<?php
use app\components\NewOffer;
use metalguardian\fotorama\Fotorama;
use app\models\Commercetype;
?>
<h1 class="part-title">Продажа коммерческой недвижимости</h1>
<?php echo $this->render('_search', ['model' => $model, 'type' => $type]); ?>
    <div class="detail-view">
        <div class="row">
            <div class="col-md-7">
                <?php
                $fotorama = Fotorama::begin([
                    'options' => [
                        'nav'   => 'thumbs',
                        'loop' => true,
                        'hash' => true,
                        'allowfullscreen' => true,
                        'autoplay' => "5000",
                    ],
                    'tagName' => 'span',
                    'useHtmlData' => false,
                    'htmlOptions' => [
                        'class' => 'custom-class',
                        'id' => 'custom-id',
                    ],
                ])?>
                ?>
                <?php if(count($object->files) === 0):?>
                    <img src="<?=Yii::getAlias('@web').Yii::$app->params['realty_default_image'];?>">
                <?php else:?>
                    <?php foreach($object->files as $img):?>
                        <img src="<?=Yii::getAlias('@web').'/'.$img->path;?>">
                    <?php endforeach;?>
                <?php endif;?>
                <?php $fotorama->end();?>
            </div>
            <div class="col-md-5">
                <div class="detail-title">Тип</div>
                <div class="detail-text"><?=$object->commercetype->name;?></div>
                <div class="detail-title">Описание</div>
                <div class="detail-text"><?=$object->detail;?></div>
                <div class="detail-title">Адрес</div>
                <div class="detail-text"><?=$object->region->name.' р-н, '.$object->address;?></div>
                <div class="detail-extra">
                    <table class="detail-extra-table">

                        <tr><td>Общая площадь:</td><td><?=$object->square;?> м<sup>2</sup></td></tr>
                        <tr><td>Цена:</td><td><?=$object->price;?> руб.</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="new-offers-container">
        <h4>Похожие предложения</h4>
        <?=NewOffer::widget([
            'count' => 5,
            'mode'  => NewOffer::MODE_SIMILAR,
            'model' => $object
        ]);?>
    </div>
<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'коммерческая недвижиость в волгограде, покупка коммерческой недвижимости, продажа каммерческой недвижимости, продать магазин, продать площадь']);
$this->registerMetaTag(['name' => 'description', 'content' => $object->detail]);
$this->title = 'Продается '.$object->commercetype->name.' по адресу: '.$object->address;
?>