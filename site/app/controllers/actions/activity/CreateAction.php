<?php


namespace app\controllers\actions\activity;


use app\base\BaseAction;
use app\models\Activity;
use yii\bootstrap\ActiveForm;
use yii\web\HttpException;
use yii\web\Response;

class CreateAction extends BaseAction
{
    public function beforeRun()
    {
        if (!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException('401','Только авторизированные пользователт могут создавать активность');
        }
        return parent::beforeRun(); // TODO: Change the autogenerated stub
    }

    public function run($date)
    {
        $model = new Activity();
        $model->date=$date;
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if (!\Yii::$app->activity->createActivity($model)) {
                print_r($model->getErrors());
            }
            return $this->controller->redirect('/calendar/createCalendar/');
        }
        return $this->controller->render('create', ['model' => $model]);
    }
}