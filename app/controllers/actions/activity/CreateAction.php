<?php


namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class CreateAction extends BaseAction
{

    public function run()
    {
        $model = new Activity();
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                //  if($model->isRepeat) {
                //     $model->repeatType = $model::REPEAT_TYPE;
                // } else {
                //      $model->repeatType = [0=>'0',1=>'1',2=>'2'];
                //   }
                /*  if(!empty($model->date)){
                      $date = \DateTime::createFromFormat('d.m.Y',$model->date);
                      if ($date) {
                          $model->date = $date->format('Y-m-d');
                      }
                  }*/
                return ActiveForm::validate($model);
            }
            if (!\Yii::$app->activity->createActivity($model)) {
                print_r($model->getErrors());
            }
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}