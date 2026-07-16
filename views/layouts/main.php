<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */


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
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100 container">
    <?php $this->beginBody() ?>
    <div class="" style="margin-left: 2rem !important; margin-right: 2rem !important; width: 100% !important; >
        <?= $this->render('_header') ?>
    </div>


    <main id=" main" class="flex-grow-1" role="main" id="page-top">
        <div class="mt-5"
            style="margin-top: 5rem !important; margin-left: 1rem !important; margin-right: 1rem !important;">

            <!-- <$this->render('_sidebar') ?> -->
            <?= $content ?>
        </div>
        </main>

        <?= $this->render('_footer') ?>

        <?php $this->endBody() ?>
</body>
<!-- Bootstrap core JavaScript-->
<script src="css/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="js/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</html>
<?php $this->endPage() ?>