<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "navigation".
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 * @property string $url
 * @property string $section
 * @property int $display_order
 * @property bool $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Navigation extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navigation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section'], 'default', 'value' => 'main'],
            [['display_order'], 'default', 'value' => 0],
            [['is_active'], 'default', 'value' => 1],
            [['title', 'icon', 'url'], 'required'],
            [['display_order'], 'default', 'value' => null],
            [['display_order'], 'integer'],
            [['is_active'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'icon'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 255],
            [['section'], 'string', 'max' => 50],
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
            'icon' => 'Icon',
            'url' => 'Url',
            'section' => 'Section',
            'display_order' => 'Display Order',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
