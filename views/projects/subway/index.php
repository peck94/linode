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
        <h2>Explanation</h2>
        <p>
            Given the size of the network, the algorithm uniformly distributes random
            points within a square. These points represent locations to be interconnected
            by a transportation system such as a subway, and the problem to be solved is
            how to interconnect these points such that the following conditions are met:
            <ol>
                <li>the cost of construction is minimized;</li>
                <li>there exists a route interconnecting every single pair of points.</li>
            </ol>
            This way, the resulting network is cheapest yet every point can be reached from
            any other point. Note that this solution does not take into account the total time
            travelled: we may also wish to minimize the time any traveller spends in the system,
            and simply meeting the above conditions does not guarantee this, thus potentially
            wasting the consumers' time. We might accomplish this by also attempting to minimize
            the length of the longest path in the graph, something I could do if I felt like it.
            The problem of finding the longest path in a graph is NP-hard in general, but the graphs
            we produce here will always be acyclic, and in this special case there does exist an
            efficient algorithm to compute the longest path. However, it is too tedious and boring
            to implement that right now.
        </p>
        
        <h2>Define the problem</h2>
        <?php $form = ActiveForm::begin(['id' => 'subway-form']); ?>
        
        <?= $form->field($model, 'size') ?>

        <?= Html::submitButton('Generate solution', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        
        <h2>View the solution</h2>
        <?php if(!empty($result)): ?>
        <div style="margin-left: auto; margin-right: auto">
            <img src="data:image/png;base64,<?= $result ?>"/>
        </div>
        <?php endif; ?>
    </div>
</div>
