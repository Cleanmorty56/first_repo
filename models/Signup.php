<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Signup extends ActiveRecord
{

    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $elo;
    public $region_id;
    public $password;

    public $password_repeat;



    public function rules()
    {
        return [
            [['username', 'email', 'first_name', 'last_name', 'password', 'region_id'], 'required'],
            [['email'], 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->elo = $this->elo;
        $user->region_id = $this->region_id;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'elo' => 'Эло (рейтинг)',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'region_id' => 'Выберите регион'
        ];
    }
}