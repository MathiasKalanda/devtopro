<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Posts;

class PostsController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $query = Posts::find()->all();
        return $this->render('index', ['data' => $query]);
        // var_dump($query);return;
    }
        
}