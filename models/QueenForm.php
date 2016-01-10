<?php

namespace app\models;

use Yii;
use yii\base\Model;

class QueenForm extends Model
{
    public $n;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'n' => 'Board size'
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['n'], 'required'],
        ];
    }
    
    public function execute()
    {
        $url = Yii::getAlias('@master/queens/main.py');
        $data = array(
            'n' => $this->n,
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
