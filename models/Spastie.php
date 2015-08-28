<?php
namespace app\models;

use yii\db\ActiveRecord;

class Spastie extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    public $key; // hash of the passphrase
    public $msg; // message encrypted with the passphrase
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'spasties';
    }
}