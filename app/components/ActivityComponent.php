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
                $activity->file = $this->saveFile($activity->file);
                if(!$activity->file) {
                   return false;
                }
            }
            return true;
        }
        return false;
    }
    private function saveFile(UploadedFile $file) {
        $name = $this->genFileName($file);
        $path = $this->getPath().$name;
        if($file->saveAs($path)) {
            return $name;
        }
        return null;
    }

    private function getPath(){
        $path = \Yii::getAlias('@webroot/files/');
        FileHelper::createDirectory($path);
        return $path;
    }


    private function genFileName(UploadedFile $file)
    {
        return time() . '_' . $file->baseName . '.' . $file->getExtension();
    }
}