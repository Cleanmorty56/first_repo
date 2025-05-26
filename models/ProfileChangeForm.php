<?php

namespace app\models;

use yii\base\Model;

class ProfileChangeForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }

    public function update($user)
    {
        if ($this->validate()) {
            $user->email = $this->email;
            return $user->save();
        }
        return false;
    }
}