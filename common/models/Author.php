<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_author}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_moderator
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_author}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_moderator', 'status'], 'integer'],
            [['username', 'email', 'password_hash', 'auth_key', 'status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'password_hash', 'auth_key'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 40]
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
            'is_moderator' => 'Is Moderator',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
    public static function getAuthor($id){
       $author = self::findOne(['id' => $id]);
        return $author->name;
    }
}
