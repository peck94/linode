<?php

/* @var $this yii\web\View */

$this->title = 'Mazectric';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$initial = [
    'rand' => 'Random',
];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Mazectric'</h1>

        <p class="lead">
            Generate complicated mazes.
        </p>
    </div>

    <div class="body-content">        
        <h2>Explanation</h2>
        <p>
            Similar to <?= Html::a('Automata', ['/projects/automata']) ?>,
            Mazectric is a 2D cellular automaton that obeys the following rules:
            <ul>
                <li>If a cell has exactly three live neighbors, it is born.</li>
                <li>If a cell has at least one and less than five live neighbors, it survives.</li>
                <li>Otherwise, the cell dies.</li>
            </ul>
            The implementation given here is actually a slightly modified version
            of Mazectric where cells also die if they risk forming certain structures
            that, in my experience, lead to shorter corridors (hence Mazectric').
            That way, the resulting mazes should have longer corridors than
            standard Mazectric.
        </p>
        
        <h2>Enter details</h2>

        <?php $form = ActiveForm::begin(['id' => 'automata-form']); ?>

        <?= $form->field($model, 'initial')->dropdownList($items) ?>

        <div class="form-group">
            <?= Html::submitButton('Visualize', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <h2>Result</h2>
        <?php if(!empty($result)): ?>
        <img src="data:image/gif;base64,<?= $result ?>"/>
        <?php endif; ?>
    </div>
</div>
