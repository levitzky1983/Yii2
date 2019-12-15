<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use yii\console\Application;
use yii\mail\MailerInterface;

class NotificationComponent extends BaseComponent
{
    /** @var MailerInterface */
    private $mailer;

    public function getMailer(){
        return $this->mailer;
    }

    public function init()
    {
        parent::init();
        $this->mailer = \Yii::$app->mailer;
    }
    /**
     * @param Activity[] $activity
     */
    public function sendNotifications(array $activity){
        foreach ($activity as $activity){
            $send = $this->getMailer()->compose('notif',['model'=>$activity])
            ->setSubject('Активность '.$activity->id.' стартует сегодня')
            ->setFrom('geekbrains@onedeveloper.ru')
            ->setTo($activity->email)->setReplyTo('www@www.ru')->send();
            if(!$send){
                return false;

                if(\Yii::$app instanceof Application){
                    echo 'send error '.$activity->email.PHP_EOL;
                }
            }
            if(\Yii::$app instanceof Application){
                echo 'send success '.$activity->email.PHP_EOL;
            }

        }
    }
}