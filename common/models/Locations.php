<?php

namespace common\models;

use app\components\ZipcodeValidator;
use backend\components\CityValidator;
use Yii;
use yii\validators\RangeValidator;

/**
 * This is the model class for table "{{%tbl_locations}}".
 * with id, zip_code, city, provice, file and logo
 * @property integer $id
 * @property string $zip_code
 * @property string $city
 * @property string $province
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_locations}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip_code', 'city', 'province', 'file'], 'required'],
            ['file', 'file', 'extensions' => 'jpg, png','skipOnEmpty' => false, 'maxFiles' => 4],
            [['zip_code'], 'string', 'max' => 25],
//            ['zip_code', ZipcodeValidator::className()],
//        ['zip_code', 'in', 'range' => self::find()->select('zip_code')->asArray()->column()],
            ['city', 'trim'],
            ['city', CityValidator::className()],
            ['province', function($attribute, $params){
                if($this->$attribute == 'error'){
                    $this->addError($attribute, 'This string contains error message');
                }
            }],
            ['zip_code', 'unique'],
            [['city', 'province'], 'string', 'max' => 100]
        ];
//        return [
//          ['zip_code', 'required', 'message' => 'Please enter zip-code, it is completely necessary'],
//            ['province', 'required', 'when' => function ($model) {
//                return $model->city == 'USA';
//            }, 'whenClient' => "function (attribute, value) {
//        return $('#city').val() == 'USA';
//    }"]
//        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zip_code' => 'Zip Code',
            'city' => 'City',
            'province' => 'Province',
            'file' => 'File',
            'logo' => 'Logo'
        ];
    }
}
