<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class NonsenseForm extends Model
{
    public $start;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'start' => 'Starting word',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['start'], 'required'],
        ];
    }
    
    public function generate()
    {
        return http_post_fields('http://linode.pecky.be/cgi-bin/nonsens.py', [
            'start' => $this->start,
        ]);
    }

}
