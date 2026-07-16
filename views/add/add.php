<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts $model */

$this->title = 'Create Post';
?>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>
                <i class="bi bi-plus-circle"></i>
                Create New Post
            </h3>
        </div>


        <div class="card-body">

            <?= $this->render('../posts/_form', [
                'model' => $model,
            ]) ?>

        </div>

    </div>

</div>