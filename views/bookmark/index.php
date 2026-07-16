<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts[] $posts */

$this->title = 'My Bookmarks';
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            <i class="bi bi-bookmarks-fill"></i>
            My Bookmarks
        </h2>

        <?= Html::a(
            '<i class="bi bi-arrow-left"></i> Back to Posts',
            ['posts/index'],
            [
                'class' => 'btn btn-secondary',
                'encode' => false,
            ]
        ) ?>
    </div>

    <?php if (empty($posts)): ?>

    <div class="alert alert-info">
        <i class="bi bi-bookmark"></i>
        You haven't bookmarked any posts yet.
    </div>

    <?php else: ?>

    <div class="row">

        <?php foreach ($posts as $post): ?>

        <div class="col-md-6 col-lg-4 mb-4">

            <div class="card h-100 shadow-sm">

                <?php if (!empty($post->images)): ?>
                <img src="<?= Html::encode($post->images) ?>" class="card-img-top"
                    style="height:220px;object-fit:cover;">
                <?php endif; ?>

                <div class="card-body">

                    <h5 class="card-title">
                        <?= Html::encode($post->title) ?>
                    </h5>

                    <p class="text-muted small">
                        <?= Yii::$app->formatter->asDate($post->created_at) ?>
                    </p>

                    <p class="card-text">
                        <?= Html::encode(mb_strimwidth($post->body, 0, 120, '...')) ?>
                    </p>

                </div>

                <div class="card-footer bg-white">

                    <?= Html::a(
                                '<i class="bi bi-eye"></i> Read',
                                ['view/view', 'id' => $post->id],
                                [
                                    'class' => 'btn btn-primary btn-sm',
                                    'encode' => false,
                                ]
                            ) ?>

                    <?= Html::a(
                                '<i class="bi bi-bookmark-x"></i> Remove',
                                ['bookmark/remove', 'id' => $post->id],
                                [
                                    'class' => 'btn btn-outline-danger btn-sm',
                                    'encode' => false,
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Remove this bookmark?',
                                    ],
                                ]
                            ) ?>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

    <?php endif; ?>

</div>