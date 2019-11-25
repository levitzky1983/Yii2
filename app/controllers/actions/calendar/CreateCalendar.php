<?php


namespace app\controllers\actions\calendar;


use app\base\BaseAction;
use app\models\Calendar;

class CreateCalendar extends BaseAction
{
    public function run(){
        $calendar = new Calendar();
        $calendar->month = date('m');
        $calendar->year = date('Y');
        return $this->controller->render('createCalendar',['calendar'=>$calendar]);
    }
}