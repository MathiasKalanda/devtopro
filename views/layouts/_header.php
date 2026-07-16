<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
/** @var app\models\User[] $user */

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
        <div class="d-flex align-items-center gap-3">
            <?= Html::a(
                '<strong class="fs-3 p-2 rounded bg-black text-white">DEV TO</strong>',
                Yii::$app->homeUrl,
                ['class' => 'navbar-brand me-4']
            ) ?>

            <form class="d-flex" role="search" action="<?= \yii\helpers\Url::to(['article/search']) ?>">
                <input class="form-control" type="search" name="q" placeholder="Search articles..." aria-label="Search"
                    style="width:350px;">
            </form>
            <?= Html::a(
                '<i class="bi bi-bookmarks-fill"></i> My Bookmarks',
                ['bookmark/index'],
                [
                    'class' => 'btn btn-outline-primary',
                    'encode' => false,
                ]
            ) ?>
        </div>

        <!-- Right Side: Nav + Theme Toggle -->
        <div class="d-flex align-items-center gap-1">
            <?php if (Yii::$app->user->isGuest): ?>
            <div class="">
                <?= Html::a(
                    '<i class="bi bi-plus-circle"></i> Create Account',
                    ['register/index'],
                    [
                        'class' => 'btn btn-primary',
                        'encode' => false,
                    ]
            ) ?>
                <?= Html::a(
                    '<i class="bi bi-plus-circle"></i> Login',
                    ['site/login'],
                    [
                        'class' => 'btn btn-primary',
                        'encode' => false,
                    ]
            ) ?>
            </div>
            <?php else: ?>
            <?= Html::a(
                '<i class="bi bi-box-arrow-right"></i> Logout',
                ['site/logout'],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'method' => 'POST',
                        'confirm' => 'Are you sure you want to log out'
                    ],
                    'encode' => false,
                ]
            ) ?>


            <?php endif; ?>
            <?php if (!Yii::$app->user->isGuest): ?> <div class="">

                <?php
                $user = Yii::$app->user->identity;

                $initials = strtoupper(
                    substr($user->first_name ?? '', 0, 1) .
                    substr($user->last_name ?? '', 0, 1)
                );

                $image = !empty($user->profile_image)
                    ? 'data:image/jpeg;base64,' . $user->profile_image
                    : null;
                ?>

                <?php if ($image): ?>

                <?= Html::img($image, [
                        'class' => 'rounded-circle',
                        'width' => 40,
                        'height' => 40,
                        'alt' => $user->username,
                    ]) ?>

                <?php else: ?>

                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                    style="width:40px; height:40px;">
                    <?= $initials ?>
                </div>

                <?php endif; ?>
                <span class="ms-2">
                    <?= $user->first_name . ' ' . $user->last_name ?>
                </span>
            </div>


            <?php endif; ?>

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