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
    public $verifyCode;
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
            ['name', 'string'],
            ['sex', 'boolean', 'message' => 'Unknown male'],
            [
                ['planets', 'planet'],
            'in',
                'range'=> range(0, 7),
            'message' => 'Uncorrest list of planet',
            'allowArray'=> 1],
            ['astronauts', 'in',
                'range'=> range(0,5),
                'message' => 'Uncorrect astronauts list',
                'allowArray' => 2],
            ['verifyCode', 'captcha'],
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
            'verifyCode' => 'checking code',
        ];
    }
}
