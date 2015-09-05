<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Visitor;
use app\models\LoginForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'admin'],
                'rules' => [
                    [
                        'actions' => ['logout', 'admin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
            $visitor->num_visits = 0;
        }
        $visitor->last_visit = $ts;
        $visitor->num_visits++;
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
    
    public function actionLogin()
    {
        $model = new LoginForm;
        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->redirect(\Yii::$app->urlManager->createUrl('admin/index'));
        }
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->redirect('index');
    }
}
