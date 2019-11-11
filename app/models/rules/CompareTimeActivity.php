<?php


namespace app\models\rules;


use app\base\BaseValidator;

class CompareTimeActivity extends BaseValidator
{
    public function validateAttribute($model, $attribute)
    {
        if(strtotime($model->timeBegin) >= strtotime($model->timeEnd)){
            $model->addError($attribute,'Время окончания события не может быть раньше времени начала');
        }
    }
}