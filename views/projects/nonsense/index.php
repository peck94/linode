<?php

/* @var $this yii\web\View */

$this->title = 'Pecky\'s projects';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Nonsense</h1>

        <p class="lead">
            Generate nonsensical English sentences from training texts.
        </p>
    </div>

    <div class="body-content">
        <h2>Generate nonsense</h2>
        <?php $form = ActiveForm::begin(['id' => 'nonsense-form']); ?>

        <?= $form->field($model, 'start') ?>

        <div class="form-group">
            <?= Html::submitButton('Generate', ['class' => 'btn btn-primary', 'name' => 'generate-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
