<?php
namespace backend\components;

use yii\validators\Validator;

class CityValidator extends Validator{
    public function validateAttribute($model, $attribute)
    {
        if (!in_array($model->$attribute, ['USA', 'Web'])) {
            $this->addError($model, $attribute, 'The city must be either "Dallas" or "Moscow".');
        }
    }
}