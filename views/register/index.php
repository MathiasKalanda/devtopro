<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\User $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\User;

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = 'Register An Account and then Login';
$this->params['meta_keywords'] = 'yii, yii2, login, sign up, authentication';
$htmlIcon = <<<HTML
{label}<div class="input-group"><span class="input-group-text" aria-hidden="true">%s</span>{input}</div>{error}{hint}
HTML;
$labelOptions = ['class' => 'form-label fw-semibold small'];
?>
<div class="site-login d-flex align-items-center justify-content-center py-5">
    <div class="card border-0 overflow-hidden login-split-card">
        <div class="row g-0">

            <!-- Brand panel -->
            <div class="col-md-5 d-none d-md-flex text-white" style="
        background-image: url('<?= Yii::getAlias('@web/images/yiiregister.avif') ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
     ">
                <div class="d-flex flex-column justify-content-between p-4 p-lg-5 w-100">
                    <div>
                        <?= Html::a(
                '<strong class="fs-3 p-2 rounded bg-black text-white">WELCOME TO DEV-TO</strong>',
                Yii::$app->homeUrl,
                ['class' => 'navbar-brand me-4']
            ) ?>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-3 login-brand-title">
                            Create <br>Account
                        </h2>
                        <p class="opacity-75 mb-0 login-brand-text">
                            Create Account and manage your account.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form panel -->
            <div class="col-md-7">
                <div class="p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <!-- Mobile-only logo -->
                        <div class="d-md-none mb-3">
                            <?= Html::img(
                                Yii::getAlias('@web/images/yii3_full_white_for_dark.svg'),
                                [
                                    'alt' => 'Yii Framework',
                                    'class' => 'login-mobile-logo',
                                    'height' => 36, 
                            ],
                            ) ?>
                        </div>
                        <h1 class="h3 fw-bold mb-1"><?= Html::encode($this->title) ?></h1>
                        <p class="text-body-secondary small">Enter your credentials to continue</p>
                    </div>

                    <?php $form = ActiveForm::begin([
                        'options' => [
                            'enctype' => 'multipart/form-data',
                        ],
                    ]); ?>

                    <div class="mb-3">
                        <?= $form->field($model,'first_name')->textInput() ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model,'last_name')->textInput() ?>
                    </div>

                    <div class="mb-4">
                        <?= $form->field($model,'username')->textInput() ?>
                    </div>
                    <div class="mb-4">
                        <?= $form->field($model,'email')->textInput() ?>
                    </div>
                    <div class="mb-4">

                        <?= $form->field($model,'phone')->textInput() ?>
                    </div>

                    <div class="mb-4">

                        <?= $form->field($model, 'profile_image')->fileInput() ?>
                    </div>
                    <div class="mb-4">
                        <?= $form->field($model,'password_hash')->passwordInput() ?>
                    </div>

                    <div class="d-grid">
                        <?= Html::submitButton(
                            'Create Account',
                            ['class'=>'btn login-btn btn-lg rounded-3 text-white']
                        ) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </div>
</div>