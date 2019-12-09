<?php


namespace app\controllers\actions\calendar;


use app\base\BaseAction;
use app\models\Activity;
use app\models\Calendar;

class CreateCalendar extends BaseAction
{
    public function run(){
        $calendar = new Calendar();
        $calendar->month = date('m');
        $calendar->year = date('Y');
       /* if((\Yii::$app->user->can('adminActivity'))){
            $admin = true;
        }*/
        return $this->controller->render('createCalendar',['calendar'=>$calendar]);
    }
}