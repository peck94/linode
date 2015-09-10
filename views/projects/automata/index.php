<?php

/* @var $this yii\web\View */

$this->title = 'Automata';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Automata</h1>

        <p class="lead">
            Visualize all 256 simple cellular automata.
        </p>
    </div>

    <div class="body-content">        
        <h2>Enter details</h2>

        <?php $form = ActiveForm::begin(['id' => 'automata-form']); ?>

        <?= $form->field($model, 'rule') ?>
        <p>
            Interesting values include: 30, 90, 110.
        </p>

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
