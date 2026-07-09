<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $images
 */
class Posts extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'created_by'], 'default', 'value' => null],
            [['title', 'body'], 'string'],
            [['created_by'], 'default', 'value' => null],
            [['created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['images'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'images' => 'Images',
        ];
    }

}