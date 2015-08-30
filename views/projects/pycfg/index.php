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
        <fieldset>
            <legend>Common tasks</legend>
            <div class="btn-group">
                <?= Html::submitButton('Generate sentence', ['class' => 'btn btn-primary', 'name' => 'pycfg-generate']) ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Normal forms</legend>
            <div class="btn-group">
                <?= Html::submitButton('Chomsky normal form', ['class' => 'btn btn-default', 'name' => 'pycfg-cnf']) ?>
                <?= Html::submitButton('Greibach normal form', ['class' => 'btn btn-default', 'name' => 'pycfg-gnf']) ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Clean-up</legend>
            <div class="btn-group">
                <?= Html::submitButton('Remove unreachable rules', ['class' => 'btn btn-default', 'name' => 'pycfg-unreach']) ?>
                <?= Html::submitButton('Remove unproductive rules', ['class' => 'btn btn-default', 'name' => 'pycfg-unprod']) ?>
                <?= Html::submitButton('Remove epsilon rules', ['class' => 'btn btn-default', 'name' => 'pycfg-eps']) ?>
            </div>
        </fieldset>

        <?php ActiveForm::end(); ?>
        
        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <pre><?= $result; ?></pre>
        <?php else: ?>
        <p>Please define a grammar and hit one of the action buttons.</p>
        <?php endif; ?>
    </div>
</div>
