<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$items = [
    // [
    //     'label' => 'Home',
    //     'url' => ['/site/index'],
    // ],
    // [
    //     'label' => 'About',
    //     'url' => ['/site/about'],
    // ],
    // [
    //     'label' => 'Contact',
    //     'url' => ['/site/contact'],
        
    //     'linkOptions' => [
    //        'class' => 'bg-black text-white rounded px-2 py-1',
    //     ],
    // ],
    [
        'label' => 'Login',
        'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest,
    ],
     [
    'label' => 'Create Account',
    'url' => ['/site/contact'],
    'linkOptions' => [
        'class' => 'text-blue-500 rounded px-2 py-1 border border-blue-700',
        'style' => 'text-decoration: none;',
        'onmouseover' => 'this.style.textDecoration="underline"',
        'onmouseout' => 'this.style.textDecoration="none"',
        ],
    ],
    [
        'label' => 'Logout (' . Html::encode(Yii::$app->user->identity?->username ?? '') . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'nav-link logout',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ],
];

?>
<header id="header">
    <?php
        NavBar::begin([
            'brandLabel' => false,
            'options' => [
                'class' => 'navbar navbar-expand-xl bg-white border-bottom fixed-top',
            ],
        ]);
    ?>

    <div class="d-flex justify-content-between align-items-center w-100">

        <!-- Left Side: Brand + Search -->
        <div class="d-flex align-items-center">
            <?= Html::a(
                '<strong class="fs-3 p-2 rounded bg-black text-white">DEV TO</strong>',
                Yii::$app->homeUrl,
                ['class' => 'navbar-brand me-4']
            ) ?>

            <form class="d-flex" role="search" action="<?= \yii\helpers\Url::to(['article/search']) ?>">
                <input class="form-control" type="search" name="q" placeholder="Search articles..." aria-label="Search"
                    style="width:350px;">
            </form>
        </div>

        <!-- Right Side: Nav + Theme Toggle -->
        <div class="d-flex align-items-center gap-1">
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $items,
            ]) ?>

            <?= Html::button(
                '&#127769;',
                [
                    'id' => 'theme-toggle',
                    'class' => 'btn btn-link fs-5 ms-2 text-decoration-none',
                ]
            ) ?>
        </div>

    </div>

    <?php NavBar::end(); ?>
</header>