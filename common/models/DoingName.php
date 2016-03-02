<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_doing_name}}".
 *
 * @property integer $id
 * @property string $surname
 *
 * @property TblDoing[] $tblDoings
 */
class DoingName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_doing_name}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surname'], 'required'],
            [['surname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoing()
    {
        return $this->hasMany(Doing::className(), ['id_name' => 'id']);
    }
}
