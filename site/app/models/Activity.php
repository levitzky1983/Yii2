<?php


namespace app\models;


use app\base\BaseModel;
use phpDocumentor\Reflection\Types\Self_;
use app\models\rules;

class Activity extends BaseModel
{
    public $title;
    public $author;
    public $description;
    public $date;
    public $timeBegin;
    public $timeEnd;
    public $isBlocked;
    public $isRepeat;
    public $repeatType;
    const NEVER = 0;
    const DAY = 1;
    const WEEK = 2;
    const MONTH = 3;
    const REPEAT_TYPE = [self::NEVER=>'Никогда',self::DAY => 'Каждый день', self::WEEK => 'Каждую неделю',self::MONTH => 'Каждый месяц'];
    public $email;
    public $useNotification;
    public $file;


    public function beforeValidate()
    {
        if(!empty($this->date)){
            $date = \DateTime::createFromFormat('d.m.Y',$this->date);
            if ($date) {
                $this->date = $date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            [['title','date','timeBegin','timeEnd','description','author'],'required'],
            [['title','date','timeBegin','timeEnd'],'string','min' => 5],
            ['date','date','format' => 'php:Y-m-d'],
            [['timeBegin','timeEnd'],'time','format' => 'php:H:i'],
            ['description','string','min' => 5,'max' => 300],
            [['isBlocked','isRepeat','useNotification'],'boolean'],
            ['email','email'],
            ['email','required','when'=>function($model){
                return $model->useNotification;
            }],
            ['title',rules\BlackTitleRule::class,'blackList' => ['Спать', 'Есть']],
            ['timeEnd',rules\CompareTimeActivity::class],
            ['repeatType','in','range' => array_keys(self::REPEAT_TYPE)],
            ['file','file','extensions' => ['jpg','png'],'maxSize' => '1000000']

        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название события',
            'author'=>'Автор события',
            'description'=>'Описание',
            'date'=>'Дата',
            'timeBegin'=>'Время начала события',
            'timeEnd'=>'Время конца события',
            'isBlocked'=>'Блокировка события',
            'isRepeat'=>'Повторение события',
            'email'=>'Почта',
            'file' => 'Добавление файла'
            //'useNotification'=>

        ];
    }
}