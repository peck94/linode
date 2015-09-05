<?php

/* @var $this yii\web\View */

$this->title = 'Subway';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Subway</h1>

        <p class="lead">
            Create efficient subway networks.
        </p>
    </div>

    <div class="body-content">
        <h2>Define the problem</h2>
        <?php $form = ActiveForm::begin(['id' => 'subway-form']); ?>
        
        <?= $form->field($model, 'size') ?>

        <?= Html::submitButton('Generate solution', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>View the solution</h2>
        <?php if(!empty($result)): ?>
        <img src="data:image/png;base64,<?= $result ?>" style="margin-left: auto; margin-right: auto"/>
        <?php endif; ?>
    </div>
</div>
