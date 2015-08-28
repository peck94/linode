<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class NonsenseForm extends Model
{
    public $rules;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'rules' => 'Grammar rules',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['rules'], 'required'],
        ];
    }

}
