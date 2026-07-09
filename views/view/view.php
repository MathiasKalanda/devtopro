<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts $post */

$this->title = $post->title;
?>

<div class="container mt-4">

    <div class="card shadow">

        <?php if (!empty($post->images)): ?>
        <img src="<?= Html::encode($post->images) ?>" class="card-img-top" alt="<?= Html::encode($post->title) ?>"
            style="max-height:400px; object-fit:cover;">
        <?php endif; ?>

        <div class="card-body">

            <h1 class="card-title">
                <?= Html::encode($post->title) ?>
            </h1>

            <p class="text-muted">
                Created:
                <?= Yii::$app->formatter->asDatetime($post->created_at) ?>
            </p>

            <hr>

            <div class="card-text">
                <?= nl2br(Html::encode($post->body)) ?>
            </div>

        </div>

        <div class="card-footer">

            <?= Html::a(
                '← Back',
                ['posts/index'],
                ['class' => 'btn btn-secondary']
            ) ?>

            <?= Html::a(
                'Edit',
                ['update/update', 'id' => $post->id],
                ['class' => 'btn btn-warning']
            ) ?>

            <?= Html::a(
                'Delete',
                ['delete/delete', 'id' => $post->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this post?',
                        'method' => 'post',
                    ],
                ]
            ) ?>

        </div>

    </div>

</div>