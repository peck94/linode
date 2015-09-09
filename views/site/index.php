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
        
        <?php if(!isset($_SERVER['HTTPS'])): ?>
        <div class="alert alert-danger">
            I recommend using this site <a href="https://www.pecky.be/">over a secure connection</a>,
            as some projects on here require you to enter possibly sensitive information. If anyone
            were to intercept your connection (say, the NSA or your own friendly government), that
            could completely defeat the purpose of these applications. It might also put you at risk.
        </div>
        <?php endif; ?>
    </div>
</div>
