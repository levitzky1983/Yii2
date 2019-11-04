<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;
use phpDocumentor\Reflection\Types\Boolean;

class ActivityComponent extends BaseComponent
{
    public function createActivity(Activity $activity) {

        if($activity->validate()){
            return true;
        }
        return false;
    }
}