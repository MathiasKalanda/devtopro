<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;

$this->render('_head');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100" data-bs-theme="light">

<head>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div class="" style="margin-left: 2rem !important; margin-right: 2rem !important; width: 100% !important; >
        <?= $this->render('_header') ?>
    </div>


    <main id=" main" class="flex-grow-1" role="main">
        <div class="mt-5"
            style="margin-top: 5rem !important; margin-left: 1rem !important; margin-right: 1rem !important;">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        </main>

        <?= $this->render('_footer') ?>

        <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>