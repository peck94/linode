<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect(\Yii::$app->urlManager->createUrl('site/login'));
        }
        
        // log access
        $ip = $_SERVER['REMOTE_ADDR'];
        $username = Yii::$app->user->identity->username;
        $model = Login::find()->where([
                    'ip' => $ip,
                    'username' => $username,
                ])->one();
        if (!$model) {
            $model = new Login;
            $model->ip = $ip;
            $model->username = $username;
        }
        $model->date = date('d M Y, H:i:s');
        $model->save();
        
        // prevent session hijacking
        if(Yii::$app->user->identity->ip !== $ip)
        {
            return $this->redirect(\Yii::$app->urlManager->createUrl('site/logout'));
        }

        return $this->render('index');
    }
}
