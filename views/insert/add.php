<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var app\models\Posts $model */

$this->title = 'Add Post';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'id' => 'add-post-form',
]); ?>

<?= $form->field($model, 'title')->textInput([
    'maxlength' => true,
    'placeholder' => 'Enter title',
]) ?>

<?= $form->field($model, 'body')->textarea([
    'rows' => 6,
    'placeholder' => 'Enter body',
]) ?>

<?= $form->field($model, 'images')->textInput([
    'maxlength' => true,
    'placeholder' => 'Enter image URL',
]) ?>

<div class="form-group mt-3">
    <?= Html::submitButton(
        'Save Post',
        ['class' => 'btn btn-primary']
    ) ?>
</div>

<?php ActiveForm::end(); ?>