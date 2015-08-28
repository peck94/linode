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
    public $seed;

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
        $url = 'http://linode.pecky.be/cgi-bin/nonsens.py';
        $data = array(
            'start' => $this->start,
            'seed' => $this->seed,
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }

}
