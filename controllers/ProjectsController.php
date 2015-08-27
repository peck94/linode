<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\NewSpastieForm;
use app\models\OldSpastieForm;

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
        
        $algo = 'twofish';
        $mode = 'cbc';
        $iv = 'spastiespastiespastie';
        $hash = 'sha256';
        
        if ($new_form->load(Yii::$app->request->post())) {
            $td = mcrypt_module_open($algo, '', $mode, '');
            mcrypt_generic_init($td, $new_form->password, $iv);
            $encmsg = mcrypt_generic($td, $new_form->message);
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);

            $key = hash($hash, $new_form->password, false);

            $spastie = new Spastie;
            $spastie->key = $key;
            $spastie->message = $encmsg;
            if($spastie->save()) {
                Yii::$app->session->setFlash('pastieCreated');
            }else{
                Yii::$app->session->setFlash('pastieFail');
            }

            return $this->refresh();
        }

        return $this->render('spasties/index', [
            'new_form' => $new_form,
            'old_form' => $old_form,
        ]);
    }
}
