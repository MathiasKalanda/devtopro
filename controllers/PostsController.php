<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Posts;

class PostsController extends Controller
{
    public function actionIndex()
{
    $posts = Posts::find()
        ->select([
            'posts.*',
            'comments_count' => 'COUNT(comments.id)'
        ])
        ->leftJoin(
            'comments',
            'comments.post_id = posts.id'
        )
        ->groupBy('posts.id')
        ->all();

    return $this->render('index', [
        'data' => $posts
    ]);
}
        
}