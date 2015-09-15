<?php

/* @var $this yii\web\View */

$this->title = 'Random';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Random</h1>

        <p class="lead">
            A pseudo-random number generator.
        </p>
    </div>

    <div class="body-content">        
        <h2>Explanation</h2>
        <p>
            This PRNG uses the rule 30 cellular automaton as a source of randomness.
        </p>
        
        <h2>Enter details</h2>

        <?php $form = ActiveForm::begin(['id' => 'automata-form']); ?>

        <?= $form->field($model, 'seed') ?>
        <?= $form->field($model, 'bits') ?>
        <?= $form->field($model, 'count') ?>

        <div class="form-group">
            <?= Html::submitButton('Generate', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <pre><?= $result ?></pre>
        <?php endif; ?>
    </div>
</div>
