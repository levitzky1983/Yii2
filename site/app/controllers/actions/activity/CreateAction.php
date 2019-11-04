<?php


namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;

class CreateAction extends BaseAction
{
    //public $name;
    public function run() {
        $model = new Activity();
        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            //print_r($model->getAttributes());
           // exit;
            //$model->title=null;
        /*    if(!$model->validate()) {
                print_r($model->getErrors());
                exit;
            }*/
            if(!\Yii::$app->activity->createActivity($model)) {
                print_r($model->getErrors());
              //  exit;
            }
        }
        return $this->controller->render('create',['model'=>$model]);
    }
}