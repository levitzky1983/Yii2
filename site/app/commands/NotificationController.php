<?php


namespace app\commands;


use app\base\BaseConsoleController;
use app\components\NotificationComponent;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use yii\helpers\Console;

class NotificationController extends BaseConsoleController
{
    public $name;

    public function options($actionID)
    {
        return ['name'];
    }

    public function optionAliases()
    {
        return [
            'n' => 'name'
        ];
    }

    public function actionTest(...$args)
    {
        echo 'test ' . $this->name . PHP_EOL;
        print_r($args);
    }

    public function actionSendTodayActivity()
    {
        $activities = \Yii::$app->activity->getTodayActivity();
        // echo Console::ansiFormat('Count activities: '.count($activities).PHP_EOL,[Console::FG_GREEN]);
        if (count($activities) == 0) {
            \Yii::$app->end(0);
        }
        /** @var NotificationComponent $notif */
        $notif = \Yii::createObject(NotificationComponent::class);
        $notif->sendNotifications($activities);
    }


}