<?php


namespace app\models;


use app\base\BaseModel;

class Calendar extends BaseModel
{
    const MONTH = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
    const WEEK = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'];
    public $month;
    public $year;
    public $day;
    public $dayInThisWeek = 1;

    public function runDay()
    {
        $firstDay = date('w', mktime(0, 0, 0, $this->month, 1, $this->year));
        $firstDay = $firstDay - 1;
        if ($firstDay == -1) {
            $firstDay = 6;
        }
        return $firstDay;
    }

    public function daysInMonth()
    {
        return date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
    }

    public function previosMonth()
    {
        if ($this->month == 1) {
            $this->month = 12;
            $this->year--;
        } else {
            $this->month--;
        }
    }

    public function nextMonth()
    {
        if ($this->month == 12) {
            $this->month = 1;
            $this->year++;
        } else {
            $this->month++;
        }
    }

    public function hasDayActivity($date){
        if(\Yii::$app->activity->getDayActivity($date)){
            return true;
        }
        return false;
    }


}