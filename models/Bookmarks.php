<?php

namespace app\models;

use yii\db\ActiveRecord;

class Bookmarks extends ActiveRecord
{
    public static function tableName()
    {
        return 'bookmarks';
    }
}