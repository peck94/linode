<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * @property string $ip
 * @property string $id
 * @property string $date
 * @property string $username
 */
class Login extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    public function attributeLabels()
    {
        return [
            'ip' => 'IP address',
            'date' => 'Date',
            'id' => 'ID',
            'username' => 'Username',
        ];
    }
    
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'logins';
    }
    
    public static function dataProvider()
    {
        $provider = new ActiveDataProvider([
            'query' => Login::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $provider;
    }
}