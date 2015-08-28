<?php

/* @var $this yii\web\View */

$this->title = 'Pecky\'s projects';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>PyCFG</h1>

        <p class="lead">
            Play with context-free grammars.
            Engine written in Python.
        </p>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['id' => 'cfg-form']); ?>
        
        <h2>Define your grammar</h2>

        <?= $form->field($model, 'rules')->textarea(['rows' => 40, 'cols' => 50]); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
