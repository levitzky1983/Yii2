<?php


namespace app\controllers\actions\day;


use app\base\BaseAction;
use app\models\Day;

class IndexAction extends BaseAction
{
    public function run($year,$month,$dayOfMonth) {
       $day = new Day();
       \Yii::$app->day->infoDay($day,$year,$month,$dayOfMonth);
        return $this->controller->render('indexDay',['day'=>$day]);
    }
}