<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Comments;


class CommentController extends Controller
{

    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['add'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ],
                ],
            ],
        ];
    }



    public function actionAdd($post_id)
    {

        $comment = new Comments();


        if($comment->load(Yii::$app->request->post()))
        {

            $comment->post_id = $post_id;

            // currently Yii demo user
            $comment->user_id = Yii::$app->user->id;


            if($comment->save())
            {
                Yii::$app->session->setFlash(
                    'success',
                    'Comment added successfully.'
                );
            }

        }


        return $this->redirect([
            'view/view',
            'id'=>$post_id
        ]);
    }



}