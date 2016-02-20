<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Spastie;

/**
 * LoginForm is the model behind the login form.
 */
class NewSpastieForm extends Model
{
    public $password;
    public $message;

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Passphrase',
            'message' => 'Spastie message',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password', 'message'], 'required'],
        ];
    }
    
    public function create()
    {
        $algo = 'twofish';
        $mode = 'cbc';
        $iv = mcrypt_create_iv(16);
        $hash = 'sha256';
        
        $password = $this->password;
        $message = $this->message;
        
        $key = hash($hash, $password, false);

        $td = mcrypt_module_open($algo, '', $mode, '');
        mcrypt_generic_init($td, $password, $iv);
        $encmsg = mcrypt_generic($td, $message);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        $spastie = new Spastie;
        $spastie->key = $key;
        $spastie->msg = base64_encode($encmsg);
        $spastie->iv = bin2hex($iv);
        return $spastie->save();
    }

}
