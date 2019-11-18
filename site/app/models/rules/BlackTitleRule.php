<?php


namespace app\models\rules;


use app\base\BaseValidator;

class BlackTitleRule extends BaseValidator
{
    public $blackList;
    public function validateAttribute($model, $attribute)
    {
        if(in_array($model->$attribute,$this->blackList)){
            $model->addError($attribute,'Недопустимое значение');
        }
    }

}

