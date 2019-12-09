<?php


namespace app\components;


use app\base\BaseComponent;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class addFileComponent extends BaseComponent
{
    public function saveFile(UploadedFile $file) {
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