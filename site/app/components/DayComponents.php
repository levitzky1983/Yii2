<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Day;

class DayComponents extends BaseComponent
{
    /* public function today(Day $day) {
         $day->date = date('jS \of F Y');
         $day->time = date('h:i:s A');
         $day->titleDay= date('l');
         if($day->titleDay === 'Saturday' || $day->titleDay === 'Sunday') {
             $day->isWeekend = true;
         } else
             $day->isWeekend = false;
         if(!$day->activity) {
             $day->activity = 'Событий не запланировано';
         }
         return $day;
     }*/
    public function infoDay(Day $day, $year, $month, $dayOfMonth)
    {
        $day->date = date('Y.m.d', mktime(0, 0, 0, $month, $dayOfMonth, $year));
        $day->time = date('H:i');
        $numberDay = date('w', mktime(0, 0, 0, $month, $dayOfMonth, $year)) - 1;
        if ($numberDay == -1) {
            $numberDay = 6;
        }
        $day->titleDay = Day::WEEK[$numberDay];
        if ($day->titleDay === Day::WEEK[5] || $day->titleDay === Day::WEEK[6]) {
            $day->isWeekend = true;
        } else
            $day->isWeekend = false;
        $day->isPast = $this->compareDayToDate($day->date);
        $day->activity = \Yii::$app->activity->getDayActivity($day->date);
        return $day;
    }

    public function compareDayToDate($date):bool {
        $date1 =\DateTime::createFromFormat('Y.m.d',$date);
        $date2 = \DateTime::createFromFormat('Y.m.d',date('Y.m.d'));
        if($date1<$date2){
            return true;
        }
        return false;
    }

}