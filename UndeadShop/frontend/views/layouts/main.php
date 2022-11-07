<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../web/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../web/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../../web/css/slicknav.min.css"/>
    <link rel="stylesheet" href="../../web/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="../../web/css/magnific-popup.css"/>
    <link rel="stylesheet" href="../../web/css/animate.css"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="../../web/css/style.css"/>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">

<div id="preloder">
    <div class="loader"></div>
</div>

<?php $this->beginBody() ?>

<header class="header-section">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/site/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            ) . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-end"><?= Yii::powered() ?></p>
        </div>
</footer>

<script src="../../web/js/jquery-3.2.1.min.js"></script>
<script src="../../web/js/bootstrap.min.js"></script>
<script src="../../web/js/jquery.slicknav.min.js"></script>
<script src="../../web/js/owl.carousel.min.js"></script>
<script src="../../web/js/jquery.sticky-sidebar.min.js"></script>
<script src="../../web/js/jquery.magnific-popup.min.js"></script>
<script src="../../web/js/main.js"></script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
