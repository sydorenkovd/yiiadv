<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $sex
 * @property string $planets
 * @property string $astronauts
 * @property integer $planet
 */
class Interview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sex', 'planets', 'astronauts', 'planet'], 'required'],
            [['sex'], 'boolean'],
            [['planet'], 'integer'],
            [['name', 'planets', 'astronauts'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'sex' => 'Sex',
            'planets' => 'What\'s the planets?',
            'astronauts' => 'what Astronauts do you know',
            'planet' => 'what Planet do you want to go',
            'verifyCode' => 'checking code'
        ];
    }
}
