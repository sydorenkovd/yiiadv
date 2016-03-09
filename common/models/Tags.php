<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "{{%tbl_tag}}".
 *
 * @property string $id
 * @property string $title
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['frequency', 'integer' ],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Title',
            'frequency' => 'Frequency'
        ];
    }
    /**
     * return post that relatives to tag
     * @return ActiveQuery
     */
    public function getTagPosts(){
        return $this->hasMany(TagPost::className(), ['tag_id' => 'id']);
    }

    /**
     * return tag's model
     * @param int $id
     * @return Tags
     * @throws NotFoundHttpException
     */
    public function getTag($id){
        if(($model = Tags::findOne($id)) !== null){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested post does not exist');
        }
    }
}
