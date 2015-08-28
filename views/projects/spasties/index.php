<?php

/* @var $this yii\web\View */

$this->title = 'Pecky\'s projects';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Spasties</h1>

        <p class="lead">
            Secret pasties.
            Basically a Pastebin clone but with encryption!
        </p>
        <p style="text-align: left">
            The system works as follows:
            <ol style="text-align: left">
                <li>You enter a passphrase and a secret message</li>
                <li>Your message is encrypted with the passphrase you entered</li>
                <li>Your passphrase is hashed</li>
                <li>The encrypted message is stored in a file named after the hashed passphrase</li>
                <li>You give the passphrase to somebody else</li>
                <li>That somebody enters the passphrase here</li>
                <li>The system hashes the passphrase and checks for a file with that name</li>
                <li>If such a file exists, it is decrypted with the supplied passphrase and its contents returned</li>
            </ol>
            The encryption used is Twofish in CBC mode with IV <kbd>spastiespastiesp</kbd>.
            The hash is SHA-256.
            Use of a secure hash function guarantees that no efficient adversary can recover the key, so
            even someone with access to the filesystem (for example, me) should not be able to retrieve it.
            Furthermore, Twofish has withstood cryptanalysis for quite a while, so the contents of the message
            should be equally safe against any probabilistic polynomial-time adversary.
        </p>
    </div>

    <div class="body-content">
        <h2>Create a new spastie</h2>
        <?php if (Yii::$app->session->hasFlash('pastieCreated')): ?>

        <div class="alert alert-success">
            Your spastie has been created.
        </div>
        <?php endif; ?>
        
        <?php if (Yii::$app->session->hasFlash('pastieFail')): ?>

        <div class="alert alert-danger">
            The spastie failed for some reason!
        </div>
        <?php endif; ?>
        
        <?php $form = ActiveForm::begin(['id' => 'new-spastie-form']); ?>

        <?= $form->field($new_form, 'password') ?>

        <?= $form->field($new_form, 'message')->textarea(['rows' => '40', 'cols' => '50']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'new-spastie-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        
        <h2>Access an existing spastie</h2>
        <?php if (Yii::$app->session->hasFlash('pastieWrong')): ?>

        <div class="alert alert-danger">
            That spastie does not seem to exist.
        </div>
        <?php endif; ?>
        <?php $form = ActiveForm::begin(['id' => 'old-spastie-form']); ?>

        <?= $form->field($old_form, 'password') ?>

        <div class="form-group">
            <?= Html::submitButton('Access', ['class' => 'btn btn-primary', 'name' => 'old-spastie-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        
        <?php if(!empty($contents) && $contents[0]): ?>
        <fieldset><legend>Spastie contents</legend>
            <pre><?= htmlspecialchars($contents[1], ENT_QUOTES, 'UTF-8'); ?></pre>
        </fieldset>
        <? endif; ?>
    </div>
</div>
