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

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Spasties</h2>

                <p>
                    Secret pasties!
                    Share encrypted pasties with anyone online.
                </p>

                <p><?= Html::a('Spasties &raquo;', ['/projects/spasties'], ['class'=>'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Nonsense</h2>

                <p>
                    Generate intelligent-sounding nonsensical English texts.
                </p>

                <p><?= Html::a('Nonsense &raquo;', ['/projects/nonsense'], ['class'=>'btn btn-default']) ?></p>
            </div>
        </div>

    </div>
</div>
