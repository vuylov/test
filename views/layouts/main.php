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
                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                    (Yii::$app->user->identity->role_id == Role::ADMIN)?
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
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        <div class="container menu">
            <div class="row">
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
