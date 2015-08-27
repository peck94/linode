<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\NewSpastieForm;
use app\models\OldSpastieForm;
use app\models\Spastie;

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
        $iv = 'spastiespastiesp';
        $hash = 'sha256';
        
        $contents = '';
        
        if($new_form->load(Yii::$app->request->post())) {
            $password = $new_form->password;
            $message = $new_form->message;
            $key = hash($hash, $password, false);
            
            $td = mcrypt_module_open($algo, '', $mode, '');
            mcrypt_generic_init($td, $password, $iv);
            $encmsg = mcrypt_generic($td, $message);
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);

            $spastie = new Spastie;
            $spastie->key = $key;
            $spastie->message = base64_encode($encmsg);
            if($spastie->save()) {
                Yii::$app->session->setFlash('pastieCreated');
            }else{
                Yii::$app->session->setFlash('pastieFail');
            }

            return $this->refresh();
        }else if($old_form->load(Yii::$app->request->post())) {
            $password = $new_form->password;
            $key = hash($hash, $password, false);
            
            if($spastie = Spastie::find()->where(['key' => $key])->one()) {
                $td = mcrypt_module_open($algo, '', $mode, '');
                mcrypt_generic_init($td, $password, $iv);

                $contents = mdecrypt_generic($td, $spastie->message);

                mcrypt_generic_deinit($td);
                mcrypt_module_close($td);
            }else{
                Yii::$app->session->setFlash('pastieWrong');
            }
        }

        return $this->render('spasties/index', [
            'new_form' => $new_form,
            'old_form' => $old_form,
            'contents' => $contents,
        ]);
    }
}
