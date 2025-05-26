<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<style>
    .navbar-brand {
        width: 256px;
        display: flex
    ;
        justify-content: center;
    }

    .social-icons {
        display: flex;
        width: 204px;
        gap: 10px;
    }
    }
</style>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="img/logo.png" alt="" style="display: flex; align-items: center"; width="96px"; height="96px">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
            'style' => 'background-color: #6b5534 !important;'
        ]
    ]);
    ?>
    <div class="d-flex justify-content-between align-items-center w-100">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav mx-auto'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Выбор турнира', 'url' => ['/site/level']],
                ['label' => 'О нас', 'url' => ['/site/about']],
                Yii::$app->user->isGuest ? ['label' => 'Регистрация', 'url' => ['/site/signup']] : '',
                Yii::$app->user->isGuest ? ('') : (Yii::$app->user->identity->isAdmin() ? (['label' => 'Админка', 'url' => ['/admin']]) :
                    (['label' => 'Профиль', 'url' => ['/profile/profile']])),
                Yii::$app->user->isGuest
                    ? ['label' => 'Вход', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ]
        ]);
        ?>
        <div class="social-icons">
            <a href="#" class="social-icon"><img src="img/free-icon-vk-2504953.png" alt="VK" style="width: 24px; height: 24px;"></a>
            <a href="#" class="social-icon"><img src="img/free-icon-telegram-2111646.png" alt="Telegram" style="width: 24px; height: 24px;"></a>
            <a href="#" class="social-icon"><img src="img/free-icon-odnoklassniki-2504930.png" alt="OK" style="width: 24px; height: 24px;"></a>
        </div>
    </div>
    <?php NavBar::end(); ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container" style="padding: 0; !important;">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <div class="mb-4"><?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?></div>
        <?php endif ?>
        <div class="mb-4"><?= Alert::widget() ?></div>
        <div><?= $content ?></div>
    </div>
</main>

<footer id="footer" class="py-4" style="background-color: #6b5534;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-start">
                <?php echo Html::img('@web/img/logo.png', ['alt' => 'ChessEvent', 'style' => 'width: 128px; height: 128px;']); ?>
            </div>
            <div class="col-md-4">
                <nav class="footer-nav d-flex justify-content-center flex-wrap">
                    <?php
                    $menuItems = [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'Турниры', 'url' => ['/site/level']],
                        ['label' => 'О нас', 'url' => ['/site/about']],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
                    } else {
                        if (Yii::$app->user->identity->isAdmin()) {
                            $menuItems[] = ['label' => 'Админка', 'url' => ['/admin']];
                        } else {
                            $menuItems[] = ['label' => 'Профиль', 'url' => ['/profile/profile']];
                        }
                    }
                    foreach ($menuItems as $item) {
                        echo Html::a($item['label'], $item['url'], ['class' => 'nav-link mx-2 text-white']);
                    }
                    ?>
                </nav>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <div class="social-icons">
                    <a href="#" class="social-icon"><img src="img/free-icon-vk-2504953.png" alt="VK" style="width: 24px; height: 24px;"></a>
                    <a href="#" class="social-icon"><img src="img/free-icon-telegram-2111646.png" alt="Telegram" style="width: 24px; height: 24px;"></a>
                    <a href="#" class="social-icon"><img src="img/free-icon-odnoklassniki-2504930.png" alt="OK" style="width: 24px; height: 24px;"></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <div class="footer-copyright text-white">
                    &copy; ChessEvent <?= date('Y') ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
