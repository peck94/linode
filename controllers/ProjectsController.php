<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\NewSpastieForm;
use app\models\OldSpastieForm;
use app\models\NonsenseForm;
use app\models\CfgForm;

class ProjectsController extends Controller
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
        return $this->render('index');
    }
    
    public function actionSpasties()
    {
        $new_form = new NewSpastieForm;
        $old_form = new OldSpastieForm;
        
        $contents = '';
        
        if($new_form->load(Yii::$app->request->post())) {
            if($new_form->create()) {
                Yii::$app->session->setFlash('pastieCreated');
            }else{
                Yii::$app->session->setFlash('pastieFail');
            }

            return $this->refresh();
        }else if($old_form->load(Yii::$app->request->post())) {
            $contents = $old_form->fetch();
            if(!$contents[0])
            {
                Yii::$app->session->setFlash('pastieWrong');
            }
        }

        return $this->render('spasties/index', [
            'new_form' => $new_form,
            'old_form' => $old_form,
            'contents' => $contents,
        ]);
    }
    
    public function actionNonsense()
    {
        $model = new NonsenseForm;
        $result = '';
        if($model->load(Yii::$app->request->post()))
        {
            $result = $model->generate();
        }
        
        return $this->render('nonsense/index', [
            'model' => $model,
            'result' => $result,
        ]);
    }
    
    public function actionPycfg()
    {
        $model = new CfgForm;
        $result = '';
        if($model->load(Yii::$app->request->post()))
        {
            if(isset($_POST['pycfg-generate']))
            {
                $result = $model->generate();
            }
        }
        
        return $this->render('pycfg/index', [
            'model' => $model,
            'result' => $result,
        ]);
    }
}
