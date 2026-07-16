<?php

namespace app\controllers;
use Yii;
use app\models\User;
use yii\web\UploadedFile;

class RegisterController extends \yii\web\Controller
{
    public function actionIndex()
{
    $model = new User();
//  
    if ($model->load(Yii::$app->request->post())) {

        $model->role_id = 2; 
        $hash =Yii::$app->security->generatePasswordHash($model->password_hash);
        $model->password_hash = $hash;

        $pro_img = UploadedFile::getInstance($model,'profile_image');
        //convert image to base 64
        $imgbase64= base64_encode(file_get_contents($pro_img->tempName));
        $model->profile_image = $imgbase64;
        
        if ($model->save()) {

            Yii::$app->session->setFlash(
                'success',
                'Account created successfully.'
            );

            return $this->redirect(['site/login']);
        }
    }

    return $this->render('index', [
        'model' => $model,
    ]);
}

}