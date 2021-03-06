<?php

/* @var $this yii\web\View */

$this->title = 'PyCFG';
$this->params['breadcrumbs'][] = $this->title;

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

        <?= $form->field($model, 'rules')->textarea(['rows' => 10, 'cols' => 20]); ?>
        <strong>Guidelines:</strong> Every rule is of the form <kbd>A -> B</kbd>,
        where <kbd>A</kbd> can be any alphanumeric name for the rule and <kbd>B</kbd>
        is a combination of plaintext characters and rule names. Within the right-hand
        side of a rule, you may refer to other rules by enclosing them in backticks.
        For example, to refer to a rule named <kbd>rule101</kbd> you write <kbd>`rule101`</kbd>.
        The grammar for a<sup>n</sup>b<sup>n</sup> can be written as follows:
        <pre>S -> a`S`b
S -> ab
S -> .</pre>
        The <kbd>.</kbd> character represents the empty string and
        <kbd>S</kbd> always marks the start symbol.
        <p>
            <?= $form->field($model, 'action')->radioList([
                'generate' => 'Generate sentence',
                'cnf' => 'Convert to Chomsky normal form',
                'gnf' => 'Convert to Greibach normal form',
                'unreach' => 'Remove unreachable rules',
                'unprod' => 'Remove unproductive rules',
                'eps' => 'Remove epsilon rules',
            ]); ?>
        </p>

        <?= Html::submitButton('Execute operation', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <pre><?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></pre>
        <?php else: ?>
        <p>Please define a grammar and hit one of the action buttons.</p>
        <?php endif; ?>
    </div>
</div>
