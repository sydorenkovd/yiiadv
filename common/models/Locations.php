<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_locations}}".
 *
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
            [['zip_code', 'city', 'province'], 'required'],
            [['zip_code'], 'string', 'max' => 25],
            ['city', 'trim'],
            ['city', 'validateCity'],
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
    public function validateCity($attribute, $params)
    {
        if (!in_array($this->$attribute, ['USA', 'Web'])) {
            $this->addError($attribute, 'The city must be either "Dallas" or "Moscow".');
        }
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
        ];
    }
}
