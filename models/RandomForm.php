<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RandomForm extends Model
{
    public $bits;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'bits' => 'Number of bits',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['bits'], 'required'],
        ];
    }
    
    public function generate()
    {
        $url = 'http://linode.pecky.be/cgi-bin/random/main.py';
        $data = array(
            'bits' => $this->bits,
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
