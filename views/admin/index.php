<?php

/* @var $this yii\web\View */

$this->title = 'Administration';
$this->params['breadcrumbs'][] = $this->title;

use yii\grid\GridView;
use app\models\Visitor;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Administration</h1>

        <p class="lead">
            Site management.
        </p>
    </div>

    <div class="body-content">
        <h2>Visitor list</h2>
        <?=
        GridView::widget([
            'dataProvider' => Visitor::dataProvider(),
            'columns' => [
                'ip',
                'first_visit',
                'last_visit',
                'num_visits',
            ],
        ])
        ?>
    </div>
</div>
