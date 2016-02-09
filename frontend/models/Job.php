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
    public static function dateVacancy($job){
        /*
 * convert datetime to UNIX timestamp
 */
        $timeAgo = '';
        $yes = '';
        $phpdate = strtotime($job->create_date); ?>
        <?
        /*
         * разница между настоящим временем и временем размещения вакансии
         */

        $pr = time() - $phpdate;
        /*
         * Отображает "сегодня" и количество пройденного времени с момента размещения вакансии в течении дня
         */
        if (date('d', $phpdate) == date('d', time())) {
            $yes = "today ";
            if($pr < 7200) {
                $timeAgo = round(($pr - 3600)/60) . ' minutes ago ';
                return $yes . $timeAgo . date("F j, Y, g:i a:", $phpdate);
            }
            if($pr > 7200 && $pr < 89000){
                $timeAgo = round(($pr - 3600)/3600) . ' hours ago ';
                return $yes . $timeAgo . date("F j, Y, g:i a:", $phpdate);
            }
        }
        /*
         * отображать дату если вакансия опубликована вчера, то есть с расхождением на один д
         * $s - модификатор смены часовых поясов
         */
        $s = 1;
        if(date('H', time()) == '00'){
            $s = 2;
        }
        if (date('d', $phpdate) == date('d', time()) - $s) {
            $yes = "yesterday ";
            return $yes . $timeAgo . date("F j, Y, g:i a:", $phpdate);
        }
/*
 * Отображает "вчера", если просматриваем вакансии за вчера, первого числа месяца
 */
        $mounth31 = ['01', '03', '05', '07', '09', '11', '12'];
        $i = -1;
        while ($i < count($mounth31) - 1) {
            $i++;
            if ((date('d', time()) == '01' && date('m', time()) == $mounth31[$i]) && date('d', $phpdate) == '30') {
                $yes = "yesterday ";
            }
        }
        $mounth30 = ['02', '04', '06', '08', '10'];
        $i = -1;
        while ($i < count($mounth30) - 1) {
            $i++;
            if ((date('d', time()) == '01' && date('m', time()) == $mounth30[$i]) && date('d', $phpdate) == '31') {
                $yes = "yesterday ";
            }
        }
        /*
         * Для февраля
         */
        if ((date('d', time()) == '01' && date('m', time()) == '03') && date('d', $phpdate) == '28') {
            $yes = "yesterday ";
        }
        /*
         * Количество прошедших дней со дня размещения вакансии
         */
        if($pr > 89000 && $pr < 2600000){
            $timeAgo = round(($pr - 3600)/86400) . ' days ago ';
        }
        /*
 * Отображение форматированой даты
 */
        return $formatedDate = $yes . $timeAgo . date("F j, Y, g:i a:", $phpdate);

    }
}
