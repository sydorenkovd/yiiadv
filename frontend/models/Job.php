<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_job}}".
 *
 * @property string $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $reqierement
 * @property string $salary
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $contact_email
 * @property string $contact_form
 * @property integer $is_published
 * @property string $create_date
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_job}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'title', 'description', 'type', 'reqierement', 'salary', 'city', 'state', 'zipcode', 'contact_email', 'contact_form', 'is_published'], 'required'],
            [['category_id', 'user_id', 'is_published'], 'integer'],
            [['description'], 'string'],
            [['create_date'], 'safe'],
            [['title', 'type', 'reqierement', 'salary', 'contact_form'], 'string', 'max' => 255],
            [['city', 'state', 'zipcode', 'contact_email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'reqierement' => 'Reqierement',
            'salary' => 'Salary',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'contact_email' => 'Contact Email',
            'contact_form' => 'Contact Form',
            'is_published' => 'Is Published',
            'create_date' => 'Create Date',
        ];
    }
}
