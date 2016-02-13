<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%tbl_posts}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $create_date
 * @property string $image
 * @property string $author
 * @property string $tags
 * @property integer $is_moderate
 */
class Posts extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'author_id'], 'required'],
            [['description'], 'string'],
            [['create_date'], 'safe'],
            [['is_moderate'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 30],
            [['tags'], 'string', 'max' => 20]
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
            'description' => 'Description',
            'create_date' => 'Create Date',
            'image' => 'Image',
            'author_id' => 'Author Id',
            'author' => 'Author',
            'tags' => 'Tags',
            'is_moderate' => 'Is Moderate',
        ];
    }
}
