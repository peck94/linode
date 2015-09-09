<?php

namespace app\models;

use Yii;
use yii\base\Model;

class AutomataForm extends Model
{
    public $rule;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'rule' => 'Rule number (0-255)',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['rule'], 'required'],
        ];
    }
    
    public function generate()
    {
        $url = 'http://linode.pecky.be/cgi-bin/automaton/main.py';
        $data = array(
            'rule' => $this->rule,
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
