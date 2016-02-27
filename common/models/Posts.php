<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
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
    public static function getTest(){
        $db = Yii::$app->db;
        /**
         * update fields in data
         */
//    $command = $db->createCommand('update tbl_posts set title = "MySQL" where title = 3');
//    $command->execute();
        /**
         * insert some rows into database
         */
//    $db->createCommand()->batchInsert('tbl_doing', ['name', 'email'],[
//      ['Chros', 'c@com.m'],
//      ['Victor', 'st@dc.cd'],
//    ])->execute();
        //-----------------------
//    $db->createCommand()->update('tbl_doing', ['name'=> 'Steve'], ['name' => 'John'])->execute();
        /**
         * how exectly to bind parameters to sql statement
         */
//$params = [':id' => $_GET['id']];
//    $post = $db->createCommand('select title from tbl_posts where id=:id')->bindValues($params)->queryOne();
//        $post = $db->createCommand()->delete('tbl_doing', 'id > 3')->execute();
//    $command->bindValue(':id', $_GET['id']);
//    return $command->query();
        //-----------------------
        /**
         * that's example how actually transactions works
         */
//        $trans = $db->beginTransaction();
//        try{
//            $db->createCommand('insert into tbl_doing ( name, email) VALUES ("vasay", "v@df.df")')->execute();
//            $db->createCommand()->batchInsert('tbl_doing',['name', 'email'], [['Kesya', 'Vddsd@cd.com']])->execute();
//            $db->createCommand('update tbl_posts set title = "MySQL" where title = "grisha"')->execute();
//            $trans->rollBack();
////            $trans->commit();
//        } catch(\Exception $e){
//            $trans->rollBack();
//            throw $e;
//        }
        //------------------
//        return $db->getSchema()->getTableNames();
//        return $post;
        return $db;
    }
    public static function queryBuilder(){
        $query = new Query();
//        $user = new Query();
//        $userQuery = $user->select('id')->from('tbl_posts')->where(['title' => 'php'])->one();
       return $query->select('user_id')->from('tbl_job')->groupBy('user_id')->orderBy(['user_id' => SORT_DESC])->all();
    }
}
