<?php
/** @var yii\web\View $this */
/** @var app\models\Posts[] $data */
use yii\helpers\Html;
?>

<?php
shuffle($data);

$featured = array_slice($data, 0, 3);
$trending = array_slice($data, 3, 5);
?>

<div class="mb-5">


    <h4 class="mb-3">🔥 Random Posts</h4>

    <?php foreach ($featured as $post): ?>

    <div class="card mb-4 shadow-sm">

        <?= Html::img($post->images, [
                'class' => 'card-img-top',
                'style' => 'height:220px; object-fit:cover;'
            ]) ?>

        <div class="card-body">

            <h4><?= Html::encode($post->title) ?></h4>

            <p class="text-muted">
                <?= Html::encode(mb_strimwidth($post->body, 0, 180, '...')) ?>
            </p>

            <?= Html::a(
                    'Read More',
                    ['view/view', 'id' => $post->id],
                    ['class' => 'btn btn-dark']
                ) ?>

        </div>

    </div>

    <?php endforeach; ?>

</div>