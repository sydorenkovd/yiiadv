<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_module}}".
 *
 * @property string $id
 * @property string $title
 * @property string $desc
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc'], 'required'],
            [['desc'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
        ];
    }
}
