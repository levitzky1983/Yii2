<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;
use phpDocumentor\Reflection\Types\Boolean;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends BaseComponent
{
    public function createActivity(Activity $activity)
    {
        $activity->file = UploadedFile::getInstance($activity,'file');
        if ($activity->validate()) {
            if (($activity->file)){
                $activity->file = \Yii::$app->addFile->saveFile($activity->file);
                if(!$activity->file) {
                   return false;
                }
            }
            return true;
        }
        return false;
    }

}