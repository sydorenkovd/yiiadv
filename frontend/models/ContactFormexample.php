<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
class ContactFormexample extends Model{
    public $name;
    public $email;
    public $male;
    public $text;

    public function rules(){
        return[
            [['name', 'email', 'text'], 'required'],
            ['email', 'email']
        ];
    }
    public function submit(){
        $array = [];
        $array[] = $this->name;
        $array[] = $this->email;
        $array[] = $this->male;
        $array[] = $this->text;
        return print_r($array);
    }
}