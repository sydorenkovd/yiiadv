<?php
namespace app\components;

use yii\validators\Validator;
use common\models\Locations;

class ZipcodeValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Invalid zip code input.';
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (!Locations::find()->where(['zip_code' => $value])->exists()) {
            $model->addError($attribute, $this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $statuses = json_encode(Locations::find()->select('zip_code')->asArray()->column());
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return <<<JS
if ($.inArray(value, $statuses) > -1) {
    messages.push($message);
}
JS;
    }
}