<?php
namespace app\controllers;    
use yii\helpers\Html;   
use YII;

class ViewController extends \yii\web\Controller
{
    public function actionView($id)
    {
        $post = \app\models\Posts::findOne($id);
        if ($post) {
            return $this->render('view', ['post' => $post]);
        } else {
            Yii::$app->session->setFlash('error', 'Post not found.');
            return $this->redirect(['posts/index']);
        }
    }
}