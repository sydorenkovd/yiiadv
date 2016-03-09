<?php
namespace common\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Class Postt is the model behind the Posts/tags form.
 *
 * @property array listTags
 * @property Posts post
 */
class Postt extends Model
{
    /* @var array */
    public $tags;

    /* @var string */
    public $title;

    /* @var string */
    public $description;
    public $file;
    public $category_id;
    public $author_id;
    public $create_date;

    /* @var posts */
    private $postModel = null;


    /**
     * @inheritdoc
     */
    public function __construct(Posts $postModel, $config = [])
    {
        $this->postModel = $postModel;
        $this->setAttributes($this->postModel
            ->getAttributes(['title', 'description', 'file', 'category_id', 'author_id', 'create_date']));
        $this->tags = ArrayHelper::map($postModel->tagPost, 'name', 'name');
        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'description', 'tags'], 'required'],
            [['description', 'title'], 'string'],
            [['tags'], 'in', 'range' => array_keys($this->listTags), 'allowArray' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Body',
            'tags' => 'Tags'
        ];
    }

    /**
     * @return bool|Posts
     */
    public function save()
    {
        if ($this->validate()) {
            $this->posts->title = $this->title;
            $this->posts->description = $this->description;
            if ($this->posts->tagPost) {
                $this->posts->removeAllTagValues();
            }
            $this->posts->addTagValues($this->tags);
            if ($this->posts->save()) {
                return $this->posts;
            }
        };

        return false;
    }

    /**
     * Return Tag list as ['id'=>'name']
     * @return array
     */
    public function getListTags()
    {
        return ArrayHelper::map(Tags::find()->all(), 'name', 'name');
    }

    /**
     * Getter to Question model
     * @return posts
     */
    public function getPosts()
    {
        return $this->postModel;
    }
}