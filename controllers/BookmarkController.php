<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Bookmarks;
use app\models\Posts;


class BookmarkController extends Controller
{
     public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::class,
                 'only' => ['add', 'remove'],
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
                     'add' => ['POST'],
                     'remove' => ['POST'],
                 ],
             ],
         ];
     }



public function actionIndex()
{
    $posts = Posts::find()
        ->innerJoin('bookmarks', 'bookmarks.article_id = posts.id')
        ->where(['bookmarks.user_id' => Yii::$app->user->id])
        ->all();

    return $this->render('index', [
        'posts' => $posts,
    ]);
}

    public function actionAdd($id)
    {
        $userId = Yii::$app->user->id;

        $exists = Bookmarks::find()
            ->where([
                'user_id' => $userId,
                'article_id' => $id,
            ])
            ->exists();

        if (!$exists) {
            $bookmark = new Bookmarks();
            $bookmark->user_id = $userId;
            $bookmark->article_id = $id;
            $bookmark->save();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRemove($id)
    {
        $userId = Yii::$app->user->id;

        Bookmarks::deleteAll([
            'user_id' => $userId,
            'article_id' => $id,
        ]);

        return $this->redirect(Yii::$app->request->referrer);
    }
}