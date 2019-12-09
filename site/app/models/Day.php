<?php


namespace app\models;


use app\base\BaseModel;

class Day extends BaseModel
{
    public $date;
    public $time;
    public $titleDay;
    public $isWeekend;
    public $isPast;
    public $activity;
    const WEEK = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

    public function rules()
    {
        return [
            [['date', 'time', 'titleDay', 'activity'], 'string'],
            [['isWeekend', 'isPast'], 'boolean']
        ];
    }

}