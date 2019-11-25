<?php


namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use yii\base\Exception;
use yii\web\HttpException;

class ActivityController extends BaseController
{

    public function actions()
    {
        return [
            'create'=>['class'=>CreateAction::class],
        ];
    }
}