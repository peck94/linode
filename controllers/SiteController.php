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
        return $this->render('index');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        $url = Yii::getAlias('@master/services/whois.sh?ip=' . $_SERVER['REMOTE_ADDR']);
        $options = array(
            'http' => array(
                'header'  => "Content-type: text/html\r\n",
                'method'  => 'GET',
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        return $this->render('about', [
            'whois' => $result,
        ]);
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
        Yii::$app->session->destroy();
        return $this->render('index');
    }
}
