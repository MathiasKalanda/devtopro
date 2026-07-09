<?php
// /home/mk/Desktop/code/YII/devto/widgets/NavigationWidget.php

namespace app\widgets;

use app\models\Navigation;
use yii\base\Widget;

class NavigationWidget extends Widget
{
    public function run()
    {
        $mainNavigation = Navigation::find()
            ->where([
                'section' => 'main',
                'is_active' => true,
            ])
            ->orderBy('display_order')
            ->all();

        $otherNavigation = Navigation::find()
            ->where([
                'section' => 'other',
                'is_active' => true,
            ])
            ->orderBy('display_order')
            ->all();

        return $this->render('navigation', [
            'mainNavigation' => $mainNavigation,
            'otherNavigation' => $otherNavigation,
        ]);
    }
}