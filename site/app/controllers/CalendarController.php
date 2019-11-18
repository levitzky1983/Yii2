<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\calendar\CreateCalendar;
use app\controllers\actions\day\IndexAction;

class CalendarController extends BaseController
{
    public function actions()
    {
        return [
            'createCalendar'=>['class'=>CreateCalendar::class,],
        ];
    }
}