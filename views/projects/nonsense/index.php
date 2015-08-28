<?php

/* @var $this yii\web\View */

$this->title = 'Nonsense';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$seeds = [
    'hagar' => 'Hagar (Mary Johnston)',
    'dracula' => 'Dracula (Bram Stoker)',
    'hackers' => 'Hackers (1995 movie)',
    'cc' => 'Cannibal Corpse lyrics'
];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Nonsense</h1>

        <p class="lead">
            Generate nonsensical English sentences.
        </p>
    </div>

    <div class="body-content">        
        <h2>Generate nonsense</h2>

        <?php $form = ActiveForm::begin(['id' => 'nonsense-form']); ?>

        <?= $form->field($model, 'seed')->dropDownList($seeds); ?>
        <?= $form->field($model, 'start') ?>

        <div class="form-group">
            <?= Html::submitButton('Generate', ['class' => 'btn btn-primary', 'name' => 'nonsense-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php if(!empty($result)): ?>
        <pre><?= $result; ?></pre>
        <?php endif; ?>
    </div>
</div>
