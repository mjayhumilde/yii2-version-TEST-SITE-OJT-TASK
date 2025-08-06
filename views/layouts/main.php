<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

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
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="container">
        <nav class="navbar navbar-expand-md bg-white navbar-light fixed-top">
            <div class="container">
                <?= Html::a(
                    '<h2 class="mb-0 text-black"><span class="text-success">TEST</span>SITE</h2>',
                    ['/site/index'],
                    ['class' => 'navbar-brand']
                ) ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        // Helper function to determine if a link is active
                        function isActive($controller, $action = 'index')
                        {
                            $currentController = Yii::$app->controller->id;
                            $currentAction = Yii::$app->controller->action->id;
                            return $currentController === $controller && $currentAction === $action;
                        }

                        // Home Link
                        $homeClass = 'nav-link fw-bold text-secondary';
                        if (isActive('site', 'index')) {
                            $homeClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <?= Html::a('HOME', ['/site/index'], ['class' => $homeClass]) ?>
                        </li>

                        <?php
                        // ABOUT Dropdown (assuming 'about', 'team', 'testimonial' are under 'site' controller)
                        $isAboutActive = isActive('site', 'about') || isActive('site', 'team') || isActive('site', 'testimonial');
                        $aboutClass = 'btn nav-link btn-secondary bg-white fw-bold dropdown-toggle border-0 text-secondary';
                        if ($isAboutActive) {
                            $aboutClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <div class="dropdown nav-item d-flex justify-content-start">
                                <a class="<?= $aboutClass ?>" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ABOUT
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><?= Html::a('About Us', ['/site/about'], ['class' => 'dropdown-item']) ?></li>
                                    <li><?= Html::a('Team', ['/site/team'], ['class' => 'dropdown-item']) ?></li>
                                    <li><?= Html::a('Testimonials', ['/site/testimonial'], ['class' => 'dropdown-item']) ?></li>
                                </ul>
                            </div>
                        </li>

                        <?php
                        // SERVICES Link
                        $servicesClass = 'nav-link fw-bold text-secondary';
                        if (isActive('site', 'services')) {
                            $servicesClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <?= Html::a('SERVICES', ['/site/services'], ['class' => $servicesClass]) ?>
                        </li>

                        <?php
                        // PRICING Link
                        $pricingClass = 'nav-link fw-bold text-secondary';
                        if (isActive('site', 'pricing')) {
                            $pricingClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <?= Html::a('PRICING', ['/site/pricing'], ['class' => $pricingClass]) ?>
                        </li>

                        <?php
                        // BLOG Link
                        $blogClass = 'nav-link fw-bold text-secondary';
                        if (isActive('site', 'blog')) {
                            $blogClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <?= Html::a('BLOG', ['/site/blog'], ['class' => $blogClass]) ?>
                        </li>

                        <?php
                        // CONTACT Link
                        $contactClass = 'nav-link fw-bold text-secondary';
                        if (isActive('site', 'contact')) {
                            $contactClass .= ' active text-success';
                        }
                        ?>
                        <li class="nav-item">
                            <?= Html::a('CONTACT', ['/site/contact'], ['class' => $contactClass]) ?>
                        </li>
                    </ul>
                    <div class="text-muted ps-2 d-flex d-md-none align-items-center justify-content-center gap-2 fs-3 mt-5 mt-md-0">
                        <i class="navs fa-brands fa-twitter social"></i>
                        <i class="navs fa-brands fa-facebook social"></i>
                        <i class="navs fa-brands fa-instagram social"></i>
                        <i class="navs fa-brands fa-linkedin social"></i>
                    </div>
                    <div class="border-start border-muted text-muted ps-2 d-none d-md-flex align-items-center justify-content-center gap-2">
                        <i class="navs fa-brands fa-twitter social"></i>
                        <i class="navs fa-brands fa-facebook social"></i>
                        <i class="navs fa-brands fa-instagram social"></i>
                        <i class="navs fa-brands fa-linkedin social"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>