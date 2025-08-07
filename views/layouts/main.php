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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
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

    <footer class="bg-dark m-0 ">
        <div class="container p-3 p-md-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 text-white g-4 g-lg-3">
                <div class="col">
                    <!-- company section -->
                    <h5>
                        COMPANY
                    </h5>
                    <div>
                        <p>Sampaloc Bolinao, Pangasinan</p>
                        <b>Phone</b> 0947325097
                        </p>
                        <p>
                            <b>Email</b> example@gmail.com
                        </p>
                    </div>
                </div>

                <!-- useful link -->
                <div class="col">
                    <h5>
                        Userful Link
                    </h5>
                    <ul class="list-unstyled ps-2">
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Home</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">About us</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Services</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Terms of service</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Privacy policy</a>
                        </li>
                    </ul>
                </div>
                <!-- our services -->
                <div class="col">
                    <h5>
                        Our Services
                    </h5>
                    <ul class="list-unstyled ps-2">
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Web Design</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Web Development</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Product Management</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Marketing</a>
                        </li>
                        <li class="mt-2">
                            <i class="fa-solid fa-chevron-right" style="color: #008000;"></i>
                            <a href="#" class="text-decoration-none text-white" style="font-size: 13px;">Graphic Design</a>
                        </li>
                    </ul>
                </div>

                <!-- newsletter -->
                <div class="col">
                    <h5 class="fw-bold">Join our Newsletter</h5>
                    <div class="w-100">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing eliolest
                            etur adipisicing eliolest
                        </p>
                        <div class="d-flex">
                            <input class="w-100" type="text" />
                            <button class="bg-success text-white border-0 rounded-end-2 py-2 px-4">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- bottom footer -->
        <div class="bg-black px-5 py-2 m-0">
            <div class="container px-0 px-md-5 py-2">
                <div class="row text-white d-flex justify-content-between text-center g-3">
                    <!-- Left -->
                    <div class="col-auto d-flex align-items-center">
                        <p class="mb-0" style="font-size: 13px;">
                            &copy; Copyright <b>TestSite</b>. All Rights Reserved
                        </p>
                    </div>

                    <!-- Right -->
                    <div class="col-auto">
                        <span class="p-2 bg-dark rounded me-1">
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                        <span class="p-2 bg-dark rounded me-1">
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                        <span class="p-2 bg-dark rounded me-1">
                            <i class="fa-brands fa-instagram"></i>
                        </span>
                        <span class="p-2 bg-dark rounded me-1">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>