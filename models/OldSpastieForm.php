<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Spastie;

/**
 * LoginForm is the model behind the login form.
 */
class OldSpastieForm extends Model
{
    public $password;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Passphrase',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password'], 'required'],
        ];
    }

    public function fetch()
    {
        $algo = 'twofish';
        $mode = 'cbc';
        $iv = openssl_random_pseudo_bytes(16);
        $hash = 'sha256';
        
        $password = $this->password;
        $key = hash($hash, $password, false);

        $spastie = Spastie::find()->where(['key' => $key])->one();
        if($spastie) {
            $td = mcrypt_module_open($algo, '', $mode, '');
            mcrypt_generic_init($td, $password, $iv);

            $contents = mdecrypt_generic($td, base64_decode($spastie->msg));

            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
            
            return [true, $contents];
        } else {
            return [false, ''];
        }
    }

}
