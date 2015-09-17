<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * @property string $ip
 * @property string $first_visit
 * @property string $last_visit
 * @property string $num_visits
 * @property string $country
 */
class Visitor extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    public function attributeLabels()
    {
        return [
            'ip' => 'IP address',
            'first_visit' => 'First visit',
            'last_visit' => 'Last visit',
            'num_visits' => 'No. of visits',
            'country' => 'Country',
        ];
    }
    
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

        return $provider;
    }
    
    public function locate()
    {
        $result = json_decode(file_get_contents('http://www.ipinfo.io/' . $this->ip));
        $this->country = $result['country'];
    }
    
    public static function locateMissing()
    {
        $visitors = Visitor::findAll();
        foreach($visitors as $visitor) {
            $visitor->locate();
            $visitor->save();
        }
    }
}