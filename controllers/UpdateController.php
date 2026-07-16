<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Posts;

class UpdateController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionUpdate($id)
    {
        $model = Posts::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Post not found.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Post updated successfully.');
            return $this->redirect(['posts/index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}