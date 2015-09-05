<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'action' => 'Password',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        $user = User::findByUsername($this->username);
        if ($user && $this->validate() && $user->validatePassword($this->password)) {
            $status = Yii::$app->user->login($user, 0);
            if($status)
            {
                Yii::$app->params['LOGIN_ADDR'] = $_SERVER['REMOTE_ADDR'];
                die('IP: ' . Yii::$app->params['LOGIN_ADDR']);
                return true;
            }else{
                return false;
            }
        } else {
            $this->addError('username', 'Username or password is invalid');
            return false;
        }
    }
}
