<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property string $ip
 * @property string $first_visit
 * @property string $last_visit
 * @property string $num_visits
 */
class Spastie extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'visitors';
    }
}