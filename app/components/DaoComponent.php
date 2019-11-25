<?php


namespace app\components;


use app\base\BaseComponent;
use yii\db\Connection;
use yii\db\Query;

class DaoComponent extends BaseComponent
{
    private function getConnection():Connection{
        return \Yii::$app->db;
    }

    public function getAllActivity(){
       /* $query = new Query();
        $record = $query->from('activity')
            ->select('*');*/
       $sql = 'SELECT * FROM activity';
       return $this->getConnection()->createCommand($sql)->queryAll();
    }

    public function getAllUsers(){
        /* $query = new Query();
         $record = $query->from('activity')
             ->select('*');*/
        $sql = 'SELECT * FROM users';
        return $this->getConnection()->createCommand($sql)->queryAll();
    }

    public function insertActivity($id_author,$title,$description,$date,$timeBegin,$timeEnd,$isBlocked,$isRepeat,$repeatType,$email){
        $sql = 'INSERT INTO activity(id_author,title,description,`date`,timeBegin,timeEnd,isBlocked,isRepeat,repeatType,email) VALUES(:id_author,:title,:description,:date,:timeBegin,:timeEnd,:isBlocked,:isRepeat,:repeatType,:email);';
        return $this->getConnection()->createCommand($sql,[':id_author'=>$id_author,':title'=>$title,':description'=>$description,':date'=>$date,':timeBegin'=>$timeBegin,':timeEnd'=>$timeEnd,':isBlocked'=>$isBlocked,':isRepeat'=>$isRepeat,':repeatType'=>$repeatType,':email'=>$email])->execute();

    }
}
