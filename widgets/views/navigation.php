<?php
/** @var yii\web\View $this */
/** @var app\models\Navigation[] $mainNavigation */
/** @var app\models\Navigation[] $otherNavigation */
use yii\helpers\Html;
?>

<div class="col my-3">
    <?php foreach($mainNavigation as $nav): ?>
    <a href="<?= $nav->url ?>" class="text-decoration-none text-dark">
        <div class="border border-secondary shadow-sm rounded my-1 py-2 px-1 hover-bg-primary">
            <i class="bi <?= $nav->icon ?> me-2"></i>
            <?= $nav->title ?>
        </div>
    </a>
    <?php endforeach; ?>
</div>

<div class="col my-3">
    <h5 class="fw-bold mt-4">Other</h5>
    <?php foreach ($otherNavigation as $item): ?>
    <a href="<?= $item->url ?>" class="text-decoration-none text-dark">
        <div class="border border-secondary shadow-sm rounded my-1 py-2 px-1 hover-bg-primary">
            <i class="bi <?= $item->icon ?> me-2"></i>
            <?= $item->title ?>
        </div>
    </a>
    <?php endforeach; ?>
</div>