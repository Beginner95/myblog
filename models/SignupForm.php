<?php

namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email'],
            ['verifyCode', 'captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}