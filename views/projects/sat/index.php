<?php

/* @var $this yii\web\View */

$this->title = 'SAT';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>SAT</h1>

        <p class="lead">
            SAT-solving for fun and profit.
        </p>
    </div>

    <div class="body-content">
        <h2>Enter a formula</h2>
        <?php $form = ActiveForm::begin(['id' => 'sat-form']); ?>
        
        <?= $form->field($model, 'formula') ?>
        
        <h2>Perform an action</h2>
        <p>
            <?= $form->field($model, 'action')->radioList([
                'truth' => 'Truth table',
                'cnf' => 'Convert to conjunctive normal form',
                'nnf' => 'Convert to negation normal form',
                'dnf' => 'Convert to disjunctive normal form',
                'anf' => 'Convert to algebraic normal form'
            ]); ?>
        </p>

        <?= Html::submitButton('Execute', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
