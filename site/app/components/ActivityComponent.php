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
        $activity->file = UploadedFile::getInstance($activity, 'file');
        $activity->id_author = \Yii::$app->user->getId();
        if ($activity->validate()) {

            if ($activity->save('false')) {
                if (($activity->file)) {
                    $activity->file = \Yii::$app->addFile->saveFile($activity->file);
                    if (!$activity->file) {
                        return false;
                    }
                }
                return true;
            }
            //проверяем вставку в бд активности
            /* if (\Yii::$app->dao->insertActivity(\Yii::$app->user->id,$activity->title,$activity->description,$activity->date,$activity->timeBegin,$activity->timeEnd,$activity->isBlocked,$activity->isRepeat,$activity->repeatType,$activity->email)){
                //проверяем наличие файлов пользователя и их добавление
                 if (($activity->file)){
                     $activity->file = \Yii::$app->addFile->saveFile($activity->file);
                     if(!$activity->file) {
                         return false;
                     }
                 }
                 return true;
             }*/

            return false;
        }
        return false;
    }

    public function getDayActivity($date){
        $activity = Activity::find()->cache(20)->where(['date' => $date])->all();
        return $activity;
    }

    public function getTodayActivity(){
        return Activity::find()->andWhere('email is not null')
            ->andWhere(['notification'=>true])
            ->andWhere('date=:date',[':date' => date('Y-m-d')])->cache(20)->all();
    }

}