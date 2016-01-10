<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MazeForm extends Model
{
    public $initial;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'initial' => 'Initial pattern',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['initial'], 'required'],
        ];
    }
    
    public function generate()
    {
        $url = Yii::getAlias('@master/maze/main.py');
        $data = array(
            'initial' => $this->initial,
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
