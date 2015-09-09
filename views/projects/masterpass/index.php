<?php

/* @var $this yii\web\View */

$this->title = 'MasterPass';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>MasterPass</h1>

        <p class="lead">
            One password to rule them all.
        </p>
    </div>

    <div class="body-content">
        <h2>Explanation</h2>
        Inspired by Manuel Blum's "human-computable passwords", this system uses
        a single master password and a name to derive a password for use under that name.
        The technical details are as follows:
        <ol>
            <li>You enter a master key and name</li>
            <li>The master key and name are put into an HMAC algorithm</li>
            <li>The output of the HMAC is your derived password</li>
        </ol>
        This way, you only need to remember the master password, since the name
        will (or should) be public information anyway. The generated password will
        be completely different for each name you enter, even though the master key
        stays the same.
        
        <h2>Enter details</h2>

        <?php $form = ActiveForm::begin(['id' => 'masterpass-form']); ?>

        <?= $form->field($model, 'master')->passwordInput() ?>
        <p>
            Please make sure your master key is <strong>secret</strong> and
            <strong>strong</strong>. I would recommend, for example, a nice long
            quote from your favorite 19th century philosopher.
        </p>
        
        <?= $form->field($model, 'name') ?>
        <p>
            Examples: Google, Gmail, Facebook, Youtube, ...
        </p>

        <div class="form-group">
            <?= Html::submitButton('Generate', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <pre><?= $result; ?></pre>
        <?php endif; ?>
    </div>
</div>
