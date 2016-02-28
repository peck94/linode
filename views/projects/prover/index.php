<?php

/* @var $this yii\web\View */

$this->title = 'Prover';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Prover</h1>

        <p class="lead">
            Propositional logic prover.
        </p>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['id' => 'prover-form']); ?>
        
        <h2>Knowledge base</h2>

        <?= $form->field($model, 'kb')->textarea(['rows' => 10, 'cols' => 20]); ?>

        <h2>Query</h2>
        
        <?= $form->field($model, 'q')->textInput(); ?>

        <?= Html::submitButton('Run prover', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <pre><?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></pre>
        <?php else: ?>
        <p>Please define a knowledge base and enter a query.</p>
        <?php endif; ?>
    </div>
</div>
