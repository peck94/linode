<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is where I'd write something about me.
        However, that's boring, so I haven't gotten around to this yet.
        Stalkers, stay tuned!
    </p>

    <code><?= __FILE__ ?></code>
</div>
