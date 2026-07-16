<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts $post */
use app\models\Comments;

$this->title = $post->title;
?>

<div class="row mt-4">
    <div class="col-md-8 bg-light p-3 rounded shadow-sm">
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

                <?php if (!Yii::$app->user->isGuest): ?>

                <?= Html::a(
                    'Edit',
                    ['update/update', 'id' => $post->id],
                    ['class' => 'btn btn-warning']
                ) ?>

                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest): ?>

                <?= Html::a(
                    'Delete',
                    ['delete/delete', 'id' => $post->id],
                    [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure?',
                            'method' => 'post',
                        ],
                    ]
                ) ?>

                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="col-md-4 bg-light p-3 rounded shadow-sm">


        <h4>
            <i class="bi bi-chat"></i>
            Comments
        </h4>
        <?php
            $commentModel = new Comments();

        ?>


        <?= $this->render('../comment/_form',[
            'model'=>$commentModel,
            'post_id'=>$post->id
            ]) 
        ?>




        <?php foreach($post->comments as $comment): ?>

        <div class="card mb-2">

            <div class="card-body">

                <p>
                    <?= Html::encode($comment->content) ?>
                </p>

                <small class="text-muted">
                    <?= Yii::$app->formatter->asDatetime(
                $comment->created_at
            ) ?>
                </small>

            </div>

        </div>


        <?php endforeach; ?>
    </div>


</div>