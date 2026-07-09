<?php
/** @var yii\web\View $this */
/** @var app\models\Posts[] $data */

use yii\helpers\Html;
?>

<?php
shuffle($data);

$featured = array_slice($data, 0,3);
$trending = array_slice($data, 3, 5);
?>

<div>

    <h4 class="mb-3">Discover More</h4>

    <?php foreach ($trending as $post): ?>

    <div class="d-flex mb-3 border-bottom pb-3">

        <img src="<?= Html::encode($post->images) ?>"
            style="width:90px;height:90px;object-fit:cover;border-radius:8px;">

        <div class="ms-3">

            <h6 class="mb-1">
                <?= Html::a(
                        Html::encode($post->title),
                        ['view/view', 'id' => $post->id],
                        ['class' => 'text-decoration-none text-dark']
                    ) ?>
            </h6>

            <p class="small text-muted mb-0">
                <?= Html::encode(mb_strimwidth($post->body, 0, 120, '...')) ?>
            </p>

        </div>

    </div>

    <?php endforeach; ?>

</div>