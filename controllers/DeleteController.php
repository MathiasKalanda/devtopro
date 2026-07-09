<?php

namespace app\controllers;
use YII;
use app\models\Posts;
class DeleteController extends \yii\web\Controller
{
    public function actionDelete($id)
    {
        $post = Posts::findOne($id);
        if ($post) {
            $post->delete();
            Yii::$app->session->setFlash('success', 'Post deleted successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Post not found.');
        }

        return $this->redirect(['posts/index']);
    }
}