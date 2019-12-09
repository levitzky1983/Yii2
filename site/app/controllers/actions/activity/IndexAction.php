<?php


namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\ActivitySearch;
use yii\data\ActiveDataProvider;

class IndexAction extends BaseAction
{
    public function run(){
        $model = new ActivitySearch();
        $provider = $model->search(\Yii::$app->request->getQueryParams());
        return $this->controller->render('index',['model'=>$model,'provider'=>$provider]);
    }
}