<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Day;

class DayComponents extends BaseComponent
{
    public function today(Day $day) {
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
    }

    public function infoDay(Day $day,$year,$month,$dayOfMonth){
        $day->date = date('d.m.Y',mktime(0,0,0,$month,$dayOfMonth,$year));
        $day->time = date('H:i');
        $numberDay = date('w',mktime(0,0,0,$month,$dayOfMonth,$year))-1;
        if($numberDay == -1){
            $numberDay = 6;
        }
        $day->titleDay= Day::WEEK[$numberDay];
        if($day->titleDay === 'Суббота' || $day->titleDay === 'Воскресенье') {
            $day->isWeekend = true;
        } else
            $day->isWeekend = false;
        if(!$day->activity) {
            $day->activity = 'Событий не запланировано';
        }
        return $day;
    }
}