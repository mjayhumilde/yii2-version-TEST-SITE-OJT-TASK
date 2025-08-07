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
    <style>
        .carousel-item {
            min-height: 100vh;
        }

        .carousel-item img {
            height: 100vh;
            object-fit: cover;
        }
    </style>
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


    <main id="main" class=" mt-5" role="main">
        <div class="mt-3">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <div class="bg-dark">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 text-white py-3 p-sm-5 g-4 g-lg-3">
                    <div class="col">
                        <h5 class=" fw-bold">COMPANY</h5>
                        <p class="m-0 mb-2">
                            Samapaloc, Bolinao, Pangasinan, Carizal st. 085
                        </p>
                        <p class="m-0">
                            <span class="fw-bold">Phone</span> 0947325097
                        </p>
                        <p class="m-0">
                            <span class="fw-bold">Email</span> example@gmail.com
                        </p>
                    </div>
                    <div class="col ">
                        <div>
                            <h6 class="fw-bold">Usefull Links</h6>
                            <div class="footer-contents">
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Home
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    About us
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Services
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Terms of service
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Privacy policy
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col ">
                        <div>
                            <h6 class="fw-bold">Our Services</h6>
                            <div class="footer-contents">
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Web Design
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Web Development
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Product Management
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Marketing
                                </p>
                                <p class="m-2">
                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                    Graphic Design
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <h6 class="fw-bold">Join our Newsletter</h6>
                        <div class="footer-contents">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing eliolest
                                etur adipisicing eliolest
                            </p>
                            <div class="d-flex">
                                <input class="news-letter-input" type="text" />
                                <button class="subscribe-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-container">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div>
                        <p class="m-0">
                            &copy; Copyright
                            <span class="fw-bold">TestSite</span>
                            . All Rights Reserved
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div class="footer-icon p-1 rounded">
                            <i class="fa-brands fa-twitter"></i>
                        </div>
                        <div class="footer-icon p-1 rounded">
                            <i class="fa-brands fa-facebook-f"></i>
                        </div>
                        <div class="footer-icon p-1 rounded">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <div class="footer-icon p-1 rounded">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>