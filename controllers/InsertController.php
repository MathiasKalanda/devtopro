<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Posts;

class InsertController extends Controller
{
    public function actionAdd()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash(
                'success',
                'Post created successfully.'
            );

            return $this->redirect(['posts/index']);
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }
}