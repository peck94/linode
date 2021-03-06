<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RandomForm extends Model
{
    public $seed;
    public $bits;
    public $count;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'seed' => 'Seed',
            'bits' => 'Number of bits',
            'count' => 'Number of results',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['seed', 'bits', 'count'], 'required'],
        ];
    }
    
    public function generate()
    {
        $url = Yii::getAlias('@master/random/main.py');
        $data = array(
            'seed' => $this->seed,
            'bits' => $this->bits,
            'count' => $this->count,
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
