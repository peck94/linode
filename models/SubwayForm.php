<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SubwayForm extends Model
{
    public $size;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'size' => 'No. of stations',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['size'], 'required'],
        ];
    }
    
    /**
     * Execute operation on grammar
     */
    public function execute()
    {
        $url = Yii::getAlias('@master/subway/main.py');
        $data = array(
            'size' => $this->size,
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
