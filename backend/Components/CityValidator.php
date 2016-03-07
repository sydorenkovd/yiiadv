<?php
namespace backend\components;

use yii\validators\Validator;
use common\models\Locations;

class CityValidator extends Validator{
public $arr = ['Dallas', 'Moscow'];
    public function init()
    {
        parent::init();
        $this->message = 'The city must be neither "Dallas" nor "Moscow".';

    }
    public function validateAttribute($model, $attribute)
    {
        if (!in_array($model->$attribute, $this->arr)) {
            $this->addError($model, $attribute, $this->message);
        }
    }
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $statuses = json_encode(['Dallas', 'Moscow']);
//        $statuses = json_encode(Locations::find()->select('zip_code')->asArray()->column());
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return <<<JS
if ($.inArray(value, $statuses) > -1) {
    messages.push($message);
}
JS;
    }
}