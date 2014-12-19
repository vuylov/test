<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Role;

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
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="center-block" style="width: 200px;margin-top: 5px">
           <a href="<?=Yii::$app->homeUrl; ?>"><img src="<?=Yii::getAlias('@web'); ?>/img/logo.png"></a>
    </div>
    <div class="center-block" style="width: 400px;margin-top: 5px">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
                ['label' => 'Партнеры', 'url' => ['/site/partners']],
                (Yii::$app->user->identity->role_id)?
                    ['label' => 'Недвижимость', 'url' => ['admin/index']]:'',
                (Yii::$app->user->identity->role_id == Role::ADMIN)?
                    ['label' => 'Пользователи', 'url' => ['user/index']]:'',
                Yii::$app->user->isGuest ?
                    ['label' => 'Войти', 'url' => ['/site/login']] :
                    ['label' => 'Выйти (' . Yii::$app->user->identity->surname.' '.Yii::$app->user->identity->firstname. ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],

            ],
        ]);
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <?= $content ?>
    </div>
    <hr>
    <div class="site-menu">
        <div class="column live-realty">
            <ul>
                <li><?=Html::a("Квартиры", ['realty/view', 'type'=>1]);?></li>
                <li><?=Html::a("Аренда жилья", ['realty/view', 'type'=>2]);?></li>
                <li><?=Html::a("Подселения", ['realty/view', 'type'=>3]);?></li>
                <li><?=Html::a("Дома, коттеджи, таунхаусы, дачи", ['realty/view', 'type'=>4]);?></li>
                <li><?=Html::a("Земельные участки", ['realty/view', 'type'=>6]);?></li>
                <li><?=Html::a("Гаражи, парковки", ['realty/view', 'type'=>7]);?></li>
                <li><?=Html::a("Продажа", ['realty/view', 'type'=>8]);?></li>
                <li><?=Html::a("Аренда", ['realty/view', 'type'=>9]);?></li>
            </ul>
        </div>
        <div class="column commerce-realty">
            <ul>
                <li><?=Html::a("Продажа", ['realty/view', 'type'=>8]);?></li>
                <li><?=Html::a("Аренда", ['realty/view', 'type'=>9]);?></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <hr>
    </div>
    <footer class="small">
        <div class="container">
            <p class="pull-left">&copy; <a href="<?=Yii::getAlias('@web'); ?>">Агенство жилья на Тулака</a> - риэлторская фирма г. Волгограда. Сделки покупки, продажи, продажа жилой и коммерческой недвижимости в Волгограде.</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
