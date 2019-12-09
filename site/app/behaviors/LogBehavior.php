<?php


namespace app\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class LogBehavior extends Behavior
{
    public function events()
    {
        return
          [ActiveRecord::EVENT_AFTER_FIND => 'log'];
    }

    public function log($message='ok event') {
        \Yii::info($message);
    }
}