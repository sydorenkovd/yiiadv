<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "{{%tbl_posts}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $create_date
 * @property string $tags
 * @property integer $is_moderate
 */

class Posts extends ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    protected $tags = [];
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
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['is_moderate'], 'integer'],
            [['tags', 'create_date'], 'safe'],
            [['logo'], 'file'],
            [['title', 'logo'], 'string', 'max' => 255],
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
        'logo' => 'logo',
            'tags' => 'Tags',
            'is_moderate' => 'Is Moderate',
        ];
    }

    /**
     * establish post's tags
     * @param $tagsId
     */
    public function setTags($tagsId){
        $this->tags = (array) $tagsId;
    }

    /**
     * identificators of tags
     * @return array
     */
    public function getTags(){
        return ArrayHelper::getColumn($this->getTagPost()->all(), 'tag_id');
    }

    /**
     * return tags of post
     * @return \yii\db\ActiveQuery
     */
    public function getTagPost(){
        return $this->hasMany(TagPost::className(), ['post_id' => 'id']);
    }

    /**
     * return model of post
     * @param $id
     * @return post
     * @throws NotFoundHttpException
     */
    public function getPost($id){
        if(($model = Posts::findOne($id)) !== null){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested post does not exist');
        }
    }
    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        TagPost::deleteAll(['post_id' => $this->id]);

        if (is_array($this->tags) && !empty($this->tags)) {
            $values = [];
            foreach ($this->tags as $id) {
                $values[] = [$this->id, $id];
            }
            self::getDb()->createCommand()
                ->batchInsert(TagPost::tableName(), ['post_id', 'tag_id'], $values)->execute();
        }

        parent::afterSave($insert, $changedAttributes);
    }
}
