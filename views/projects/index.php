<?php

/* @var $this yii\web\View */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Pecky's projects</h1>

        <p class="lead">This page lists all of my fascinating projects.</p>
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
            <div class="col-lg-4">
                <h2>PyCFG</h2>
                <p>
                    Play with context-free grammars.
                </p>
                <p><?= Html::a('PyCFG &raquo;', ['/projects/pycfg'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Queens</h2>
                <p>
                    Solve the generalized <em>n</em>-queens problem.
                </p>
                <p><?= Html::a('Queens &raquo;', ['/projects/queens'], ['class' => 'btn btn-default']) ?></p>
            </div>
            
            <div class="col-lg-4">
                <h2>Subway</h2>
                <p>
                    Create efficient subway networks.
                </p>
                <p><?= Html::a('Subway &raquo;', ['/projects/subway'], ['class' => 'btn btn-default']) ?></p>
            </div>
            
            <div class="col-lg-4">
                <h2>MasterPass</h2>
                <p>
                    Remembering tens of different, complicated passwords is so 2005.
                </p>
                <p><?= Html::a('MasterPass &raquo;', ['/projects/masterpass'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Automata</h2>
                <p>
                    Visualize all 256 simple cellular automata.
                </p>
                <p><?= Html::a('Automata &raquo;', ['/projects/automata'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Mazectric'</h2>
                <p>
                    Generate complicated mazes.
                </p>
                <p><?= Html::a('Mazectric\' &raquo;', ['/projects/mazectric'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Random</h2>
                <p>
                    A pseudo-random number generator.
                </p>
                <p><?= Html::a('Random &raquo;', ['/projects/random'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Prover</h2>
                <p>
                    Propositional logic prover.
                </p>
                <p>
                    <?= Html::a('Prover &raquo;', ['/projects/prover'], ['class' => 'btn btn-default']) ?>
                </p>
            </div>
        </div>

    </div>
</div>
