<?php


namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class CreateAction extends BaseAction
{

    public function run($date)
    {
        $model = new Activity();
        $model->date=$date;
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
            \Yii::$app->dao->insertActivity(1/*тут надо будет вытаскиваит id автора из таблицы*/,$model->title,$model->description,$model->date,$model->timeBegin,$model->timeEnd,$model->isBlocked,$model->isRepeat,$model->repeatType,$model->email);
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}