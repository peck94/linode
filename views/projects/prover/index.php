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
        
        <p><strong>Guidelines:</strong> The knowledge base must consist of a set of Horn clauses that are defined to be true.
        The prover will use these when attempting to prove the query. For example:
        <pre>
p1
p2
p3
q1: p1, p2
q2: q1, p3
q3: q1, q2
q4: ~q3, ~p4, p5
        </pre>
        This knowledge base defines propositions p1, p2 and p3 to be true and establishes Horn clauses p1 &and; p2 &rarr; q1,
        q1 &and; p3 &rarr; q2, q1 &and; q2 &rarr; q3 and &not; q3 &and; &not; p4 &and; p5 &rarr; q4.</p>

        <h2>Query</h2>
        
        <?= $form->field($model, 'q')->textInput(); ?>
        
        <p>
            The query is allowed to be any proposition or negation of a proposition, for example q3 or &not; p1.
        </p>

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
