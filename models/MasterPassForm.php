<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MasterPassForm extends Model
{
    public $master;
    public $name;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'master' => 'Master key',
            'name' => 'Name',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['master', 'name'], 'required'],
        ];
    }
    
    public function generate()
    {
        return hash_hmac('sha256', $this->name, $this->key, false);
    }

}
