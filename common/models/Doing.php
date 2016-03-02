<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tbl_doing}}".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 */
class Doing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_doing}}';
    }
public function behaviors(){
    return [
      [
          'class' => TimestampBehavior::className(),
          'attributes' => [
              ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
              ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
          ],
      ],
    ];
}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 50],
            [['created_at'], 'safe'],
            [['updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_name' => 'Name ID',
            'email' => 'Email',
            'created_at' => 'Create time',
            'updated_at' => 'Update time',
        ];
    }
    public function trans($id, $param = []){
        $customer = Doing::findOne($id);
        $res = Doing::getDb()->transaction(function($db) use ($customer, $param){
           $customer->email = $param['email'];
            $customer->save();
            return $customer;
        });
        return $res;
    }
    public function getDoingName(){
        return $this->hasOne(DoingName::className(), ['id' => 'id_name']);
    }
}
