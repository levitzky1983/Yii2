<?php


namespace app\controllers;


use app\base\BaseController;

class DaoController extends BaseController
{
    //public $activity;
    public function actionActivity() {
        $activity = \Yii::$app->dao->getAllActivity();
        return $this->render('activity',['activity'=>$activity]);
    }

    public function actionUsers() {
        $activity = \Yii::$app->dao->getAllUsers();
        return $this->render('users',['users'=>$activity]);
    }
}