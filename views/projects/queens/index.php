<?php

/* @var $this yii\web\View */

$this->title = 'Queens';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>PyCFG</h1>

        <p class="lead">
            Solve the generalized <em>n</em>-queens problem.
        </p>
    </div>

    <div class="body-content">
        <h2>Define the problem</h2>
        <?php $form = ActiveForm::begin(['id' => 'queens-form']); ?>
        
        <?= $form->field($model, 'n') ?>

        <?= Html::submitButton('Generate solution', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>Result</h2>
        <div class="board">
        <?php
            if(!empty($result)) {
                $n = sqrt(strlen($result));
                for($row = 0; $row < $n; $row++) {
                    for($col = 0; $col < $n; $col++) {
                        $cell = $result{$n*$row + $col};
                        if($cell == 0) {
                            echo '<div class="cell">&nbsp;</div>';
                        }else{
                            echo '<div class="cell queen">&nbsp;</div>';
                        }
                    }
                    echo '<div style="clear: both; display: block"></div>';
                }
            }
        ?>
        </div>
    </div>
</div>
