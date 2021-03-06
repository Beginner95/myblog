<?php

namespace app\models;


use yii\base\Model;
use Yii;

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

    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}