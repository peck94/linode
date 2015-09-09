<?php

/* @var $this yii\web\View */

$this->title = 'Pecky\'s homepage';
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Pecky's homepage</h1>

        <p class="lead">A place of science and wonder.</p>

        <p><?= Html::a('View all projects', ['/projects'], ['class'=>'btn btn-primary']) ?></p>
    </div>
</div>
