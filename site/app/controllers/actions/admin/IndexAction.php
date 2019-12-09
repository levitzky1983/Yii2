<?php


namespace app\controllers\actions\admin;


use app\base\BaseAction;
use yii\web\HttpException;

class IndexAction extends BaseAction
{

  public function run(){
      return $this->controller->render('index');
  }
}