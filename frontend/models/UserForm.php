<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class Userform extends ActiveRecord{

    public static function tableName(){
        return '{{%tbl_doing}}';
    }
    public function rules(){
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
    public function attributeLabels(){
        return [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
        ];
    }
}