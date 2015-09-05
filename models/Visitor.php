<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * @property string $ip
 * @property string $first_visit
 * @property string $last_visit
 * @property string $num_visits
 */
class Visitor extends ActiveRecord
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
    
    public static function dataProvider()
    {
        $provider = new ActiveDataProvider([
            'query' => Visitor::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $provider->getModels();
    }
}