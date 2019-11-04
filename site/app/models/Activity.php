<?php


namespace app\models;


use app\base\BaseModel;

class Activity extends BaseModel
{
    public $title;
    public $author;
    public $description;
    public $date;
    public $time;
    public $isBlocked;
    public $isRepeat;

    public function rules()
    {
        return [
            [['title','date','time','description','author'],'required'],
            [['title','date','time','author'],'string'],
            ['description','string'],
            [['isBlocked','isRepeat'],'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название события',
            'author'=>'Автор события',
            'description'=>'Описание',
            'date'=>'Дата',
            'time'=>'Время',
            'isBlocked'=>'Блокировка события',
            'isRepeat'=>'Повторение события',
        ];
    }
}