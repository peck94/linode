<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use models\Visitor;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
        $ip = $_SERVER['REMOTE_ADDR'];
        $ts = date('d M Y, H:i:s');
        
        $visitor = Visitor::find()->where(['ip' => $ip])->one();
        if(!$visitor)
        {
            $visitor = new Visitor;
            $visitor->ip = $ip;
            $visitor->first_visit = $ts;
            $visitor->count = 0;
        }
        $visitor->last_visit = ts;
        $visitor->count++;
        $visitor->save();
        
        return $this->render('index');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
