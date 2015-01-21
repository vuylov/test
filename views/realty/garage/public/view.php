<?php
use app\components\NewOffer;
use metalguardian\fotorama\Fotorama;
?>
<h1 class="part-title">Гаражи и парковки</h1>
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
                <div class="detail-title">Описание</div>
                <div class="detail-text"><?=$object->detail;?></div>
                <div class="detail-title">Адрес</div>
                <div class="detail-text"><?=$object->region->name.' р-н, '.$object->address;?></div>
                <div class="detail-extra">
                    <table class="detail-extra-table">
                        <tr><td>Тип:</td><td><?=$object->garagetype->name;?></td></tr>
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
$this->registerMetaTag(['name' => 'keywords', 'content' => 'земельные участки в волгограде, земля в волгограде, продажа земельных участков в волгограде, покупка земельных участков в волгограде']);
$this->registerMetaTag(['name' => 'description', 'content' => $object->address]);
$this->title = 'Продается гараж, парковка по адресу: '.$object->address;
?>