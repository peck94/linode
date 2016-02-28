<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ProverForm extends Model
{
    public $kb;
    public $q;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'kb' => 'Knowledge base',
            'q' => 'Query',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['kb', 'q'], 'required'],
        ];
    }
    
    /**
     * Execute operation on grammar
     */
    public function execute()
    {
        $url = Yii::getAlias('@master/prover/main.py');
        $data = array(
            'kb' => $this->kb,
            'q' => $this->q,
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
