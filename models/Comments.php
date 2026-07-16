<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'integer'],
            ['content', 'required'],
        ];
    }


    public function getPost()
    {
        return $this->hasOne(Posts::class, [
            'id' => 'post_id'
        ]);
    }
}