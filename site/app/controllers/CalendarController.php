<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\calendar\CreateCalendar;
use app\controllers\actions\day\IndexAction;
use yii\web\HttpException;

class CalendarController extends BaseController
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest){
            throw new HttpException('401','Только авторизированные пользователи могут польлзоваться календарем');
        }
        return parent::beforeAction($action);
    }
    public function actions()
    {
        return [
            'createCalendar'=>['class'=>CreateCalendar::class,],
        ];
    }
}