<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_tagPost}}".
 *
 * @property integer $tag_id
 * @property integer $post_id
 */
class TagPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_tagPost}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'post_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'post_id' => 'Post ID',
        ];
    }
    public function getPost(){
        return $this->hasOne(Posts::className(), ['id' => 'post_id']);
    }
    public function getTag(){
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}
