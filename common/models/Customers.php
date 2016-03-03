<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_customers}}".
 *
 * @property integer $id
 * @property string $customer_name
 * @property string $zip_code
 * @property string $city
 * @property string $provice
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_customers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'zip_code', 'city', 'provice'], 'required'],
            [['customer_name', 'city', 'provice'], 'string', 'max' => 100],
            [['zip_code'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'zip_code' => 'Zip Code',
            'city' => 'City',
            'provice' => 'Provice',
        ];
    }
}
