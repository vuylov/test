<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Агенство Жилья',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Услуги', 'url' => ['/site/services']],
            ['label' => 'Партнеры', 'url' => ['/site/partners']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Войти', 'url' => ['/site/login']] :
                ['label' => 'Выйти (' . Yii::$app->user->identity->surname.' '.Yii::$app->user->identity->firstname. ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container menu">
        <div class="row">
            <div class="col-md-8">
                <?= $content ?>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>Мои объекты недвижимости</li>
                    <li><?=Html::a("Квартиры", ['admin/view', 'type'=>1]);?></li>
                    <li><?=Html::a("Аренда жилья", ['admin/view', 'type'=>2]);?></li>
                    <li><?=Html::a("Подселения", ['admin/view', 'type'=>3]);?></li>
                    <li><?=Html::a("Дома, коттеджи, таунхаусы, дачи", ['admin/view', 'type'=>4]);?></li>
                    <li><?=Html::a("Земельные участки", ['admin/view', 'type'=>6]);?></li>
                    <li><?=Html::a("Гаражи, парковки", ['admin/view', 'type'=>7]);?></li>
                    <li><?=Html::a("Продажа", ['admin/view', 'type'=>8]);?></li>
                    <li><?=Html::a("Аренда", ['admin/view', 'type'=>9]);?></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
