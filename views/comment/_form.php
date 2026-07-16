<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var app\models\Comments $model */
/** @var app\models\Posts $model */
/** @var int $post_id */


$form = ActiveForm::begin([
    'action'=>[
        'comment/add',
        'post_id'=>$post_id
    ]
]);

?>


<?= $form->field($model,'content')
    ->textarea([
        'rows'=>4,
        'placeholder'=>'Write a comment...'
    ])
?>



<?= Html::submitButton(
    'Comment',
    [
        'class'=>'btn btn-primary'
    ]
) ?>


<?php ActiveForm::end(); ?>