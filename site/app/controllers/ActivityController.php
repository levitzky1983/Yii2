<?php


namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use app\controllers\actions\activity\IndexAction;
use app\models\Activity;
use yii\base\Exception;
use yii\web\HttpException;

class ActivityController extends BaseController
{

    public function actions()
    {
        return [
            'create' => ['class' => CreateAction::class],
            'index' => ['class' => IndexAction::class]
        ];
    }

    public function actionView($id)
    {
        $model = Activity::find()->where(['id'=>$id])->one();

        return $this->render('view', ['model' => $model]);
    }
}