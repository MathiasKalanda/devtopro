<?php

namespace app\controllers;
use YII;
use app\models\Posts;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class DeleteController extends \yii\web\Controller
{


    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['delete'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'delete' => ['POST'],
            ],
        ],
    ];
}
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