<?php

/* @var $this yii\web\View */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Login</h1>

        <p class="lead">
            Login with your credentials.
        </p>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ?>

        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
