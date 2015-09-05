<?php

/* @var $this yii\web\View */

$this->title = 'Queens';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Queens</h1>

        <p class="lead">
            Solve the generalized <em>n</em>-queens problem.
        </p>
    </div>

    <div class="body-content">
        <h2>Explanation</h2>
        <p>
            The <em>n</em>-queens problem asks how one can place <em>n</em> queens
            on an <em>n &times; n</em> chess board such that no queen can directly
            attack another queen.
        </p>
        
        <h2>Define the problem</h2>
        <?php $form = ActiveForm::begin(['id' => 'queens-form']); ?>
        
        <?= $form->field($model, 'n') ?>

        <?= Html::submitButton('Generate solution', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>View the solution</h2>
        <div class="board">
        <?php
            if(!empty($result)) {
                $n = sqrt(strlen($result)-1);
                for($row = 0; $row < $n; $row++) {
                    for($col = 0; $col < $n; $col++) {
                        $cell = $result{$n*$row + $col};
                        if($cell == 0) {
                            echo '<div class="cell">&nbsp;</div>';
                        }else{
                            echo '<img src="/web/images/queen.png" class="cell">';
                        }
                    }
                    echo '<div style="clear: both; display: block"></div>';
                }
            }
        ?>
        </div>
    </div>
</div>
