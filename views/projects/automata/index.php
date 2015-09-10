<?php

/* @var $this yii\web\View */

$this->title = 'Automata';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$items = [
    'single' => 'Traditional',
    'random' => 'Random',
];

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Automata</h1>

        <p class="lead">
            Visualize all 256 simple cellular automata.
        </p>
    </div>

    <div class="body-content">        
        <h2>Explanation</h2>
        <p>
            An <em>elementary cellular automaton</em> is basically a row of <em>n</em>
            bits together with a set of rules for transforming that row into another
            row of the same length. For any bit <em>i</em>, the rules specify what
            value <em>i</em> gets by inspecting the current value and the immediate
            (left and right) neighbors. This means a single rule may be summarized
            in four bits, as in the table below:
            <br>
            <table class="table">
                <tr>
                    <th>Left</th>
                    <th>Current</th>
                    <th>Right</th>
                    <th>New</th>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
            </table>
            <br>
            This rule says that, if the current bit's left neighbor is 0, its right
            neighbor is 0 and its current value is 1, then its new value should be 1.
            There are 2<sup>3</sup> = 8 possible states to be examined, and each state
            requires specifying a single output bit. So one can count that the
            elementary cellular automata can be summarized by an 8-bit number,
            or a single byte (i.e. a value from 0 to 255 inclusive). This means
            there are exactly 256 possible distinct elementary cellular automata.
        </p>
        <p>
            In general, a <em>d</em> dimensional cellular automaton will have
            3<sup>d</sup> immediate neighbors. The number of states is then equal
            to 2<sup>(3<sup>d</sup>)</sup>, and we may summarize such an automaton
            by a 2<sup>(3<sup>d</sup>)</sup>-bit number. In conclusion, there are
            2<sup>(2<sup>(3<sup>d</sup>)</sup>)</sup> cellular automata in <em>d</em>
            dimensions.
        </p>
        
        <h2>Enter details</h2>

        <?php $form = ActiveForm::begin(['id' => 'automata-form']); ?>

        <?= $form->field($model, 'rule') ?>
        <p>
            Interesting values include: 30, 90, 110.
        </p>
        
        <?= $form->field($model, 'initial')->dropdownList($items) ?>

        <div class="form-group">
            <?= Html::submitButton('Visualize', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <img src="data:image/png;base64,<?= $result ?>"/>
        <?php endif; ?>
    </div>
</div>
