<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

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
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100 bg-light">
    <?php $this->beginBody() ?>

    <nav class="
        relative
        w-full
        flex flex-wrap
        items-center
        justify-between
        py-4
        bg-secondary
        text-gray-500
        hover:text-gray-700
        focus:text-gray-700
        shadow-lg
        navbar navbar-expand-lg bg-dark
        ">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between  px-4 sm:px-10">
            <button class="
            sm:hidden
            navbar-toggler
            text-gray-500
            border-0
            hover:shadow-none hover:no-underline
            py-2
            px-2.5
            bg-transparent
            focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
          " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="w-6" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                    </path>
                </svg>
            </button>
            <div class="collapse navbar-collapse flex flex-grow items-center " id="navbarSupportedContent">
                <a class="
              flex
              items-center
              text-gray-900
              hover:text-gray-900
              focus:text-gray-900
              mt-2
              lg:mt-0
              mr-4
            " href="/">
                    <img src="/images/logo.png" style="height: 40px"
                         alt="" loading="lazy"/>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav flex flex-col md:flex-row pl-0 list-style-none mr-auto">
                    <li class="nav-item p-2">
                        <a class="nav-link text-white hover:text-white focus:text-white p-0"
                           href="/">Bosh sahifa</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link text-white-50 hover:text-white focus:text-white p-0"
                           href="/check">Auto analiz</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link text-white-50 hover:text-white focus:text-white p-0"
                           href="/port">Port</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
    </nav>

<?=$content?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
