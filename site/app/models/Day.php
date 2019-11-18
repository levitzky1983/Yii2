<?php


namespace app\models;


use app\base\BaseModel;

class Day extends BaseModel
{
    public $date;
    public $time;
    public $titleDay;
    public $isWeekend;
    public $activity;
    const WEEK = ['Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'];

    public function rules()
    {
        return [
           [['date','time','titleDay','activity'],'string'],
            ['isWeekend','boolean']
        ];
    }

    public function compareDayToDate(){
        $date1 = strtotime($this->date);
        $date2 = strtotime(date('Y-m-d'));
        if($date1<$date2){
            return true;
        }
        return false;
    }
}