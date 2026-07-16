<?php
/** @var yii\web\View $this */
/** @var app\models\Posts[] $data */
// /** @var app\models\Bookmarks[] $data */

use yii\helpers\Html;

?>


<div class="row">

    <div class="col-md-3 mt-2 bg-light p-3 rounded shadow-sm">
        <?php echo $this->render('leftPanel') ?>
        <?php echo $this->render('leftPanelNav') ?>
        <?php echo $this->render('smallRandom',[
        'data' => $data,
        ]) ?>
    </div>

    <div class="col-md-6 bg-light p-3 rounded shadow-sm">
        <div class="d-flex justify-content-start align-items-center my-2 gap-2">
            <h2 class="fs-6 fw-bold border rounded-pill px-4 py-2 bg-light">Latest Posts</h2>
            <h2 class="fs-6 fw-bold border rounded-pill px-4 py-2">Trendings</h2>
            <h2 class="fs-6 fw-bold border rounded-pill px-4 py-2">Popular</h2>
            <?php if (!Yii::$app->user->isGuest): ?>

            <?= Html::a(
        '<i class="bi bi-plus-circle"></i> New Post',
        ['add/add'],
        [
            'class' => 'btn btn-primary',
            'encode' => false,
        ]
    ) ?>

            <?php endif; ?>
        </div>

        <?php foreach ($data as $post): ?>
        <div class=" card mb-5">
            <?= Html::img("$post->images", ['class' => 'w-100 mb-5']) ?>
            <div class="card-body">

                <h2><?= Html::encode($post->title) ?>
                </h2>

                <p class="line-clamp-3"><?= Html::encode($post->body) ?></p>
            </div>
            <div class="card-footer p-3 d-flex justify-content-between align-items-center">
                <small class="text-muted">Published on <?= Html::encode($post->created_at) ?></small>
                <div class="d-flex justify-content-between align-items-center gap-3">

                    <span class="text-muted">
                        <i class="bi bi-chat"></i>

                        <?= $post->comments_count ?? 0 ?>

                        Comments
                    </span>
                    <?php
            $bookmarked = \app\models\Bookmarks::find()
                ->where([
                    'user_id' => Yii::$app->user->id,
                    'article_id' => $post->id,
                ])
                ->exists();
            ?>

                    <?= Html::a(
                    $bookmarked
                        ? '<i class="bi bi-bookmark-fill"></i>'
                        : '<i class="bi bi-bookmark"></i>',
                    $bookmarked
                        ? ['bookmark/remove', 'id' => $post->id]
                        : ['bookmark/add', 'id' => $post->id],
                    [
                        'class' => 'btn btn-outline-warning',
                        'encode' => false,
                        'data' => [
                            'method' => 'post',
                        ],
                    ]
            ) ?>

                    <?= Html::a('Read More', ['view/view', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class=" col-md-3 bg-light p-3 rounded shadow-sm">
        <div class="card p-3">
            <?php echo $this->render('randomPosts',[
    'data' => $data,
]) ?>
        </div>
    </div>

</div>