<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class CfgForm extends Model
{
    public $rules;
    public $action;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'rules' => 'Grammar rules',
            'action' => 'Action',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['rules', 'action'], 'required'],
        ];
    }
    
    /**
     * Execute operation on grammar
     */
    public function execute()
    {
        $url = 'https://linode.pecky.be:80/cgi-bin/pycfg/main.py';
        $data = array(
            'rules' => $this->rules,
            'cmd' => $this->action,
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
