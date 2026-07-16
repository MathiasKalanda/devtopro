<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var app\models\Posts $model */
/** @var int $post_id */

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'title')->textInput() ?>

<?= $form->field($model, 'body')->textarea([
    'rows' => 8,
]) ?>

<?= $form->field($model, 'images')->textInput() ?>

<div class="form-group mt-3">

    <?= Html::submitButton(
        $model->isNewRecord ? 'Create Post' : 'Update Post',
        [
            'class' => $model->isNewRecord
                ? 'btn btn-primary'
                : 'btn btn-warning',
        ]
    ) ?>

</div>

<?php ActiveForm::end(); ?>