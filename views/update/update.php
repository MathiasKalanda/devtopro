<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posts $model */

$this->title = 'Edit Post';
?>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3 class="mb-0">
                <i class="bi bi-pencil-square"></i>
                Edit Post
            </h3>
        </div>

        <div class="card-body">

            <?= $this->render('../posts/_form', [
                'model' => $model,
            ]) ?>

        </div>

    </div>

</div>